<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Package;
use App\Models\UserChatSetting;
use App\Models\UserWhatsAppSetting;
use App\Models\UserSmsSetting;
use App\Models\Country;
use App\Models\PhoneNumber;
use App\Notifications\Reminder;
use Stripe;
use Validator;
use Session;
use Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

use Laravel\Sanctum\PersonalAccessToken;


use Twilio\Rest\Client;

class GettingStartedController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:customer,team','is_admin']);
    }

    public function index()
    {
        $customer_id =loginUser()->id;
        $user = Customer::find($customer_id); 
        return view('user.getstarted.getting-started', compact('user'));
    }

    public function saveCompanyDetail(Request $request)
    {
        $customer_id = Auth::user()->id;

        $customer = Customer::find($customer_id); 

        $customer->company_name = $request->company_name;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('user.getting-started.package')->with('success', 'Company Detail saved/updated successfully!');
    }

    public function packages()
    {
        Session::forget('package_redirect');
              
        if (str_contains(url()->previous(), '/customer/getting-started')) { 
            Session::put(['package_redirect' => 1]);
        }else{
            Session::put(['package_redirect' => 0]);
        }              
              
        $customer_id = Auth::user()->id;
        $user = Customer::find($customer_id);
        $packages = Package::whereStatus(1)->get();

        return view('user.getstarted.package', compact('user', 'packages'));
    }

    public function savePackage(Request $request)
    {              
        $customer_id = Auth::user()->id;

        $customer = Customer::find($customer_id); 

        $package = Package::find($request->package_id); 

        if ($package->price < $customer->balance) {

        $startDate = Carbon::now();

        $customer->package_start_date = date('Y-m-d', strtotime($startDate));        

        switch ($package->billing_cycle) {
            case 'yearly':
            $end_date  = $startDate->addYear();
            break;

            case 'monthly':
            $end_date = $startDate->addMonth(1);
            break;

            case 'weekly':
            $end_date  = $startDate->addWeek(1);
            break;

            case 'daily':
            $end_date   = $startDate->addDay(1);
            break;          

            case 'half yearly':
            $end_date   = $startDate->addMonths(6);
            break;

            default:
            $end_date   = $startDate->addDay(1);
            break;
        }              

        $customer->package_end_date = date('Y-m-d', strtotime($end_date));

        $customer->withdraw($package->price);

        $customer->package_id = $request->package_id;

        $customer->save();       
        
        Administrator::find(1)->notify(new Reminder(
            'User purchased a new package',
             '',
            'reminder',
            $customer->id,
             ''
         ));

        if(Session::get('package_redirect') == 0){
            Session::forget('package_redirect');
            return redirect()->route('user.dashboard')->with('success', "Package purchased successfully!");  
        }

        }else{
            $total = $package->price;

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $product_response = $stripe->products->create([
                'name' => 'Payment on Behalf Of Chat Journey',
            ]);        


            if(isset($product_response) && $product_response != ''){
                $price_response = $stripe->prices->create([
                    'unit_amount' => $total*100,
                    'currency' => 'usd',        
                    'product' => $product_response['id'],
                ]);
            }

            if(isset($price_response) && $price_response != ''){

                $payment_link_response = $stripe->paymentLinks->create([
                    'line_items' => [
                        [
                            'price' => $price_response['id'],
                            'quantity' => 1,
                        ],
                    ],
                    'after_completion' => [
                        'redirect' => [
                            'url' => route('user.getting-started.package.success'),
                        ],
                        'type' => 'redirect',
                    ]
                ]);

            }    

            if(isset($payment_link_response) && $payment_link_response != ''){                    
                $payment_link_id = $payment_link_response['id'];    

                Session::put(['payment_link_id' => $payment_link_id, 'amount' => $total, 'package_id' => $package->id]);           

            }            

            return redirect()->away($payment_link_response['url']);
        }


        return redirect()->route('user.getting-started.setting')->with('success', 'Package saved/updated successfully!');
    }

    public function settings()
    {
        $customer_id = Auth::user()->id;
        $user = Customer::find($customer_id); 

        $role = Role::where('name', 'Team'.$customer_id)->first(); 

        if (!$role) {
            Role::create(['name' => 'Customer'.$customer_id, 'guard_name' => 'customer', 'customer_id' => $customer_id]);

            Role::create(['name' => 'Team'.$customer_id, 'guard_name' => 'customer', 'customer_id' => $customer_id]);
        }             
                
        $chat_setting = UserChatSetting::where('customer_id', $customer_id)->first(); 

        return view('user.getstarted.setting', compact('user', 'role', 'chat_setting'));
    }

    public function saveChatSetting(Request $request)
    {              
        $customer_id = Auth::user()->id;

        $input = $request->except('_token');   

        $input['customer_id'] = $customer_id;         
        
        UserChatSetting::create($input);

        return redirect()->route('user.getting-started.setting', ['tab' => 'permission'])->with('success', 'Chat Setting saved/updated successfully!');
    }

    public function saveTeamPermission(Request $request)
    {              
        $customer_id = Auth::user()->id;

        $role = Role::where('name', 'Team'.$customer_id)->first();              

        $permissions = $request->permissions ? $request->permissions : [];
              
        $role->syncPermissions($permissions);

        return redirect()->route('user.getting-started.wallet')->with('success', 'Team Permissions saved/updated successfully!');
    }

    public function wallet()
    {
        $user_id = Auth::user()->id;
        $user = Customer::find($user_id);

        return view('user.getstarted.wallet', compact('user'));
    }

    public function addBalanceToWallet(Request $request)
    {
        $request->validate([
            'amount' => ['required'],
        ]);

        $customer_id = Auth::user()->id;
        $user = Customer::find($customer_id);

        $total = $amount = $request->amount;

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $product_response = $stripe->products->create([
            'name' => 'Payment on Behalf Of Chat Journey',
        ]);        


        if(isset($product_response) && $product_response != ''){
            $price_response = $stripe->prices->create([
                'unit_amount' => $total*100,
                'currency' => 'usd',        
                'product' => $product_response['id'],
            ]);
        }

        if(isset($price_response) && $price_response != ''){              


            $payment_link_response = $stripe->paymentLinks->create([
                'line_items' => [
                    [
                        'price' => $price_response['id'],
                        'quantity' => 1,
                    ],
                ],
                'after_completion' => [
                    'redirect' => [
                        'url' => route('user.getting-started.wallet.success'),
                    ],
                    'type' => 'redirect',
                ]
            ]);

        }    

        if(isset($payment_link_response) && $payment_link_response != ''){                    
            $payment_link_id = $payment_link_response['id'];    

            Session::put(['payment_link_id' => $payment_link_id, 'amount' => $total, 'redirect' => $request->redirect ?? '']);           

        }          

        return redirect()->away($payment_link_response['url']);
    }

    public function stripeSuccessWallet(Request $request)
    {
        $amount = Session::has('amount') ? session()->get('amount') : 0;
        $payment_link_id = Session::has('payment_link_id') ? session()->get('payment_link_id') : '';
        $redirect = Session::has('redirect') ? session()->get('redirect') : '';
        $user_id = Auth::user()->id;
        $email = Auth::user()->email;

        $user = Auth::user();

        $message_details = $user->firstname.' '.$user->lastname. " has added £".$amount." in their wallet";

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $stripe->paymentLinks->update(
            $payment_link_id,
            ['active' => false] 
        );

        $customer = $stripe->customers->create(
            [

                'email' => Auth::user()->email,
            ]
        );

        $user->deposit($amount);

        $message = '£ '.$amount.' credited to your wallet successfully!';

        session()->forget('payment_link_id'); 
        session()->forget('amount'); 

        if(isset($redirect) && !empty($redirect)){
            return redirect()->to($redirect)->with('success', $message); 
        }

        return redirect()->route('user.getting-started.whatsapp')->with('success', $message);            
    }

    public function stripeSuccessPackage(Request $request)
    {
        $amount = Session::has('amount') ? session()->get('amount') : 0;
        $package_id = Session::has('package_id') ? session()->get('package_id') : 0;
        $payment_link_id = Session::has('payment_link_id') ? session()->get('payment_link_id') : '';
        $user_id = Auth::user()->id;
        $email = Auth::user()->email;

        $user = Auth::user();

        $package = Package::find($package_id); 

        $customer = Customer::find(auth()->user()->id);    

        $customer->package_id = $package_id;              

        $startDate = Carbon::now();
        $customer->package_start_date = date('Y-m-d', strtotime($startDate));
        switch ($package->billing_cycle) {
            case 'yearly':
            $end_date  = $startDate->addYear();
            break;

            case 'monthly':
            $end_date = $startDate->addMonth(1);
            break;

            case 'weekly':
            $end_date  = $startDate->addWeek(1);
            break;

            case 'daily':
            $end_date   = $startDate->addDay(1);
            break;          

            case 'half yearly':
            $end_date   = $startDate->addMonths(6);
            break;

            default:
            $end_date   = $startDate->addDay(1);
            break;
        }

        $customer->package_end_date = date('Y-m-d', strtotime($end_date));              

        $customer->save();

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $stripe->paymentLinks->update(
            $payment_link_id,
            ['active' => false] 
        );

        $customer = $stripe->customers->create(
            [

                'email' => Auth::user()->email,
            ]
        );

        $user->deposit($amount);
        $user->withdraw($amount);

        $message = 'Package purchased successfully!';

        session()->forget('payment_link_id'); 
        session()->forget('amount'); 
        session()->forget('package_id'); 

        if(Session::get('package_redirect') == 0){
            Session::forget('package_redirect');
            return redirect()->route('user.dashboard')->with('success', $message);  
        }

        return redirect()->route('user.getting-started.package')->with('success', $message);            
    }

    public function whatsapp()
    {
        $customer_id = Auth::user()->id;
        $user = Customer::find($customer_id); 

        $packages = Package::whereStatus(1)->get();

        $phone_numbers = PhoneNumber::whereStatus('available')->whereType('whatsapp')->get(['number', 'id', 'type']);              

        // $phone_numbers = $this->getTelnyxNumbers();

        $token = PersonalAccessToken::where('tokenable_id',auth()->user()->id)->where('tokenable_type','App\Models\Customer')->exists();

        $planText="";
        if(!$token){
            $token = auth()->user()->createToken("Whatstapp");
            if(!$token || empty($token->token)){
                return redirect()->route('user.getting-started.whatsapp');
            }
            $verfify_token = $token->token ?? 'djssssssssssssssssssssssssssssssssss';
        }else{
        $token = PersonalAccessToken::where('tokenable_id',auth()->user()->id)->where('tokenable_type','App\Models\Customer')->first();
            $verfify_token = $token->token;
        }
      
        $whatsapp_setting = UserWhatsAppSetting::where('customer_id', $customer_id)->first();

        return view('user.getstarted.whatsapp', compact('user', 'packages', 'whatsapp_setting', 'phone_numbers', 'verfify_token'));
    }

    public function waysms()
    {
        $customer_id = Auth::user()->id;
        $user = Customer::find($customer_id); 

        $packages = Package::whereStatus(1)->get(); 
        $countries = Country::get(); 

        $sms_setting = UserSmsSetting::where('customer_id', $customer_id)->first();

        $token = PersonalAccessToken::where('tokenable_id',auth()->user()->id)->where('tokenable_type','App\Models\Customer')->first();

        $planText="";
        if(!$token){
            $token = auth()->user()->createToken("Whatstapp");
            $verfify_token = $token->token;
        }else{
            $verfify_token = $token->token;
        }

        $phone_numbers = PhoneNumber::whereStatus('available')->whereType('sms')->get(['number','id']);
        
        return view('user.getstarted.waysms', compact('user', 'packages', 'countries', 'sms_setting', 'phone_numbers', 'verfify_token'));
    } 

    public function saveWhatsapp(Request $request)
    {              
        $validator = Validator::make( $request->all(), [
            'connected_number' => ( $request->connect_to_whatsApp == 0 ) ? 'required' : '',
            'select_number' => ( $request->connect_to_whatsApp == 1 ) ? 'required' : '',
        ]);

        if ($request->connect_to_whatsApp == 1 && $request->select_number && !empty($request->select_number)) {
            $number = explode('_', $request->select_number)[0];
            $currency = explode('_', $request->select_number)[1];
            $cost = explode('_', $request->select_number)[2];

            $connected_number = $number;
        }else{
            $connected_number = $request->connected_number;
        }

        if ( $validator->fails() ) {
            return response()->json( [ 'errors' => $validator->errors() ] );
        }

        $setting = UserWhatsAppSetting::updateOrCreate( 
            [
                'customer_id' => auth()->user()->id 
            ], 
            [
                'connected_number' => $connected_number, 
                'currency' => $currency ?? null,
                'cost' => $cost ?? null,
                'own_number' => $request->connect_to_whatsApp,
                'phone_number_id' => $number->id ?? null

            ]
        );

        return response()->json( [ 'success' => 'Customer Chat setting saved successfully!' ] );
    }

    public function saveWhatsappProfile(Request $request)
    {
        $customer_id = Auth::user()->id;

        $name = '';

        $admin = UserWhatsAppSetting::where('customer_id', $customer_id)->first();

        if ($request->hasfile('profile')) {

            $image      = $request->file('profile');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/customer/whatsapp/', $name, 'public');

            if (isset($admin->profile)) {

                $path   = 'public/uploads/customer/whatsapp/' . $admin->profile;

                Storage::delete($path);
            }
        }

        $setting = UserWhatsAppSetting::updateOrCreate( 
            [
                'customer_id' => auth()->user()->id 
            ], 
            [
                'profile' => $name,
                'email' => $request->email,
                'website' => $request->website

            ]
        );


        return redirect()->route('user.getting-started.waysms')->with('success', 'Whatsapp Profile saved/updated successfully!');

    }

    public function saveWhatsappSetup(Request $request)
    {              
        $customer_id = Auth::user()->id;

        $setting = UserWhatsAppSetting::updateOrCreate( 
            [
                'customer_id' => auth()->user()->id 
            ], 
            [
                'permanent_access_token' => $request->permanent_access_token,
                'whatsapp_phone_number_id' => $request->whatsapp_phone_number_id,
                'whatsapp_app_id' => $request->whatsapp_app_id,
                'business_account_id' => $request->business_account_id,
                'verify_token' => $request->verify_token,
                'callback_url' => $request->callback_url,
                'whatsapp_settings_done' => 1
            ]
        );


        return redirect()->route('user.getting-started.waysms')->with('success', 'Whatsapp Profile saved/updated successfully!');
    }

    public function saveWaysms(Request $request)
    {
        $request->validate([
            'connected_number' => ['required'],
            'country_id' => ['required'],
        ]);              


        if ($request->connected_number && $request->country_id == 199) {

            $number = $request->connected_number;

            $data = $this->PurchaseInfobipNumber($number);                     

            $setting = UserSmsSetting::updateOrCreate( 
                [
                    'customer_id' => auth()->user()->id 
                ], 
                [
                    'connected_number' => $number, 
                    'country_id' => $request->country_id,
                    'cost_per_month' => $data['price']['pricePerMonth'],
                    'setup_cost' => $data['price']['setupPrice'],
                    'currency' => $data['price']['currency'],
                ]
            );

        }else{
            $number = $request->connected_number;          
            $this->PurchaseTwilioNumber($number);  

            $setting = UserSmsSetting::updateOrCreate( 
                [
                    'customer_id' => auth()->user()->id 
                ], 
                [
                    'connected_number' => $number, 
                    'country_id' => $request->country_id,

                ]
            );
        }

        PhoneNumber::updateOrCreate( 
                [
                    'customer_id' => auth()->user()->id,
                    'created_by' => 'Customer',
                    'type' => 'sms',
                    'number' => $number
                ], 
                [
                    'connected_number' => $number, 
                    'status' => 'assigned',
                    'country' => @$data['country'],
                    'capabilities' => 'sms',
                    'billing_cycle' => 'monthly',
                    'price' => @$data['price']['pricePerMonth'],
                    'currency' => @$data['price']['currency'],

                ]
            );

        return redirect()->route('user.dashboard')->with('success', 'Way2 Sms setting saved/updated successfully!');
    }


    public function getTwilioNumbers($country_id)
    {
        $countryCode = Country::where('id', $country_id)->value('iso2') ?? 'US';

        if($countryCode == "ZA"){
            $curl = curl_init();

            $infobip_username = env('INFOBIP_USERNAME');
            $infobip_password = env('INFOBIP_PASSWORD');

            $data = $infobip_username. ':' .$infobip_password;

            $encodedData = base64_encode($data);

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://6ymed.api.infobip.com/numbers/1/numbers/available?country=US&capabilities=SMS',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Basic '.$encodedData,
                    'Accept: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;
        }else{

            $sid = env('TWILIO_SID');
            $token = env('TWILIO_TOKEN');
            $fromNumber = env('TWILIO_FROM');

            $infobip_username = env('TWILIO_SID');
            $infobip_password = env('TWILIO_TOKEN');

            $data = $infobip_username. ':' .$infobip_password;

            $encodedData = base64_encode($data);


            try {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.twilio.com/2010-04-01/Accounts/".$sid."/AvailablePhoneNumbers/".$countryCode."/Local.json",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'GET',
                  CURLOPT_HTTPHEADER => array(
                    'Authorization: Basic '.$encodedData
                ),
              ));

                $response = curl_exec($curl);

                curl_close($curl);
                $result = json_decode($response, 1);
                return $result;

            } catch (Exception $e) {
                echo '<pre>'; print_r($e); echo '</pre>'; exit();

                echo "Error: " . $e->getMessage();
            }
        }
    }


    public function PurchaseInfobipNumber($number)
    {

        $json_data = '{
    "numberKey": "2290A1FAAE4A809F0AADA58EB1625F7B",
    "number": "12028369537",
    "country": "US",
    "countryName": "United States",
    "type": "VIRTUAL_LONG_NUMBER",
    "capabilities": [
        "SMS",
        "VOICE",
        "MMS"
    ],
    "shared": false,
    "price": {
        "pricePerMonth": 19.651882,
        "setupPrice": 19.651882,
        "currency": "ZAR"
    },
    "additionalSetupRequired": true,
    "editPermissions": {
        "canEditNumber": true,
        "canEditConfiguration": true
    },
    "applicationId": "default"
}';

return json_decode($json_data, 1);



        $infobip_username = env('INFOBIP_USERNAME');
        $infobip_password = env('INFOBIP_PASSWORD');

        $data = $infobip_username. ':' .$infobip_password;

        $encodedData = base64_encode($data);

        $curl = curl_init();

        $data = ["number" => $number];                                   

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://6ymed.api.infobip.com/numbers/1/numbers',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic '.$encodedData,
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);              

        curl_close($curl);

        return json_decode($response, 1);
    }

    public function PurchaseTwilioNumber($number)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $fromNumber = env('TWILIO_FROM');

        try {

            $client = new Client($sid, $token);

            $purchasedNumber = $client->incomingPhoneNumbers->create([
                'phoneNumber' => $number,
                'smsEnabled' => true
            ]);                  

            return $purchasedNumber->phoneNumber;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getTelnyxNumbers()
    {
        $curl = curl_init();

        $telnyx_api_key = env('TELNYX_API_KEY');

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.telnyx.com/v2/available_phone_numbers',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: Bearer '.$telnyx_api_key
            ),
        ));

        $response = curl_exec($curl);

        $numbers = [];

        $result = json_decode($response, 1);


        foreach ($result['data'] as $key => $number) {                      
            $numbers[$key]['number'] = $number['phone_number'];
            $numbers[$key]['currency'] = $number['cost_information']['currency'];
            $numbers[$key]['cost'] = $number['cost_information']['monthly_cost'];
        }

        curl_close($curl);
        return $numbers;
    }
}
