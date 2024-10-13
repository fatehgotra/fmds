<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Integration;
use App\Models\IntegrationList;
use App\Models\IntegrationListPerson;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use PragmaRX\Countries\Package\Countries;

class IntegrationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:customer,team', 'is_admin']);
    }

    public function checkIntegration($uuid, $integration_name, $action)
    {

        $integration = Integration::whereUuid($uuid)->whereIntegration($integration_name)->first();

        if (is_null($integration) && $action == 'xhr') {
            return response()->json(['id' => $uuid, 'status_code' => 404, 'message' => 'Integration not found']);
        }

        $response = Http::withBasicAuth($integration->app_id, $integration->secret)->get('https://api.planningcenteronline.com/people/v2/lists?per_page=10');
        $result = json_decode($response->body());

        if (is_null($result)) {

            $integration->status = '0';
            $integration->save();
            if ($action == 'xhr') {
                return response()->json(['id' => $uuid, 'status_code' => 401, 'message' => 'Credentials not working']);
            }
        } else {
            $this->integrateRelations($result, $uuid, $integration->app_id, $integration->secret);
            $integration->status = '1';
            $integration->save();
            if ($action == 'xhr') {
                return response()->json(['id' => $uuid, 'status_code' => 200, 'message' => 'Integration connected successfully']);
            }
        }
    }

    public function integrateRelations($result, $integrationId, $app_id, $secret)
    {

        $integration = Integration::whereUuid($integrationId)->first();

        if (isset($result->data)) {

            $listData = [];
            $listData = array_merge($listData, $result->data);
            $next_url = $result->links?->next;

            $customer_id = getCustomerId();

            while ($next_url) {
                $response = Http::withBasicAuth($app_id, $secret)->get($next_url);
                $result2 = json_decode($response->body());

                if (isset($result2->data)) {
                    $listData = array_merge($listData, $result2->data);
                    $next_url = $result2->links?->next ?? null;
                } else {
                    $next_url = null;
                }
            }

            if (isset($listData)) {

                $peopleData = [];
                $contacts_count = 0;
                foreach ($listData as $list) {

                    IntegrationList::updateOrCreate(
                        [
                            'list_id' => $list->id,
                            'customer_id' => $customer_id,
                            'integration_id' => $integration->id,
                        ],
                        [
                            'customer_id'    => $customer_id,
                            'integration_id' => $integration->id,
                            'list_id'        => $list->id,
                            'list_name'      => $list->attributes?->name,
                            'list_description' => $list->attributes?->description,
                            'list_status'      =>  $list->attributes?->status,
                            'total_people'     =>   $list->attributes?->total_people
                        ]
                    );

                    $contacts_count += $list->attributes?->total_people;



                    // $response = Http::withBasicAuth($app_id, $secret)->get('https://api.planningcenteronline.com/people/v2/lists/'.$list->id.'/list_results?per_page=100');
                    // $people_result = json_decode($response->body());



                    // $peopleData = array_merge($peopleData, $people_result->data);
                    // $nextp_url = $people_result->links?->next ?? null;

                    // while ($nextp_url) {
                    //     $response = Http::withBasicAuth($app_id, $secret)->get($nextp_url);
                    //     $people_result2 = json_decode($response->body());

                    //     if (isset($people_result2->data)) {
                    //         $peopleData = array_merge($peopleData, $people_result2->data);
                    //         $nextp_url = $people_result2->links?->next ?? null;
                    //     } else {
                    //         $nextp_url = null;
                    //     }
                    // }

                }

                // if( isset($peopleData) ){
                //     foreach($peopleData as $people){

                //     $relationship = $people->relationships;
                //     $list_id =  $relationship?->list?->data?->id;
                //     $person_id =  $relationship?->person?->data?->id;


                //     //List Members
                //         IntegrationListPerson::updateOrCreate(
                //             [
                //                 'person_id'      => $person_id,
                //                 'customer_id'    => $customer_id,
                //                 'integration_id' => $integration->id,
                //             ],
                //             [
                //                 'customer_id'          => $customer_id,
                //                 'integration_id'       => $integration->id,
                //                 'list_id'              => $list_id,
                //                 'person_id'            => $person_id,
                //             ]
                //         );

                //     }
                // }

                $integration->lists    = count($listData);
                $integration->contacts = $contacts_count;
                $integration->save();
            }
        }
    }

    public function index()
    {
        $integrations = Integration::whereCustomerId(getCustomerId())->orderBy('id', 'desc')->paginate(10);

        return view('user.integration.list', compact('integrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.integration.add');
    }

    public function rockadd()
    {

        return view('user.integration.rock-add');
    }

    public function rockedit()
    {

        return view('user.integration.rock-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'app_id' => 'required',
            'secret'  => 'required',
        ]);

        $inputs = $request->except('_token');
        $inputs['customer_id'] = getCustomerId();
        $integration = Integration::create($inputs);
        $this->checkIntegration($integration->uuid, 'Planning Center', 'document');

        return redirect()->route('user.integration.index')->with('info', 'Integration added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $integration = Integration::whereUuid($uuid)->first();
        if (is_null($integration)) {
            return redirect()->back()->with('error', 'Integration not found');
        }
        return view('user.integration.edit', compact('integration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Integration $integration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $this->validate($request, [
            'name' => 'required',
            'app_id' => 'required',
            'secret'  => 'required',
        ]);

        $inputs = $request->except('_token', '_method');
        $inputs['customer_id'] = getCustomerId();
        Integration::whereUuid($uuid)->update($inputs);
        $inregration = Integration::whereUuid($uuid)->first();

        $this->checkIntegration($uuid, $inregration->integration, 'document');

        return redirect()->route('user.integration.index')->with('info', 'Integration updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        Integration::whereUuid($uuid)->delete();

        return redirect()->back()->with('info', 'Integration deleted successfully');
    }

    public function getIntegrationList(Request $request)
    {
        $integration = Integration::whereUuid($request->id)->first();
        $intList = IntegrationList::whereIntegrationId($integration->id)->get();
        $options = "<option value=''>Select List<option>";
        if (isset($intList)) {
            foreach ($intList as $list) {
                $options .= "<option value='" . $list->uuid . "'>" . $list->list_name . "<option>";
            }
        } else {
            return response()->json(['status_code' => 200, 'message' => 'No list found']);
        }
        return response()->json(['status_code' => 200, 'lists' => $options]);
    }

    public function addList(Request $request)
    {

        IntegrationList::where([
            'customer_id' => getCustomerId(),
            'uuid'        => $request->select_list
        ])->update([
            'in_list' => '1'
        ]);

        return redirect()->back()->with('info', 'List added successfully');
    }

    public function createList(Request $request)
    {

        $this->validate($request, [
            'type' => 'required',
            'list_name' => 'required',
        ]);
        if ($request->type == 'group') {
            IntegrationList::create([

                'customer_id' => getCustomerId(),
                'list_name' => $request->list_name,
                'in_list'   => '1',
                'list_id'   => 0,
            ]);

            return redirect()->back()->with('info', 'List created successfully');
        } else {

            return redirect()->back()->with('error', 'Sorry request not available in integration');
        }
    }

    public function listImportPeople(Request $request)
    {
        try {

            $list = IntegrationList::whereUuid($request->id)->first();

            if ($request->name == 'Planning Center') {
                $personData = [];

                $response = Http::withBasicAuth($list->integration?->app_id, $list->integration?->secret)->get('https://api.planningcenteronline.com/people/v2/lists/' . $list->list_id . '/list_results?per_page=100');
                $result = json_decode($response->body());
                $personData = $result->data;
                $next_url = $result?->links?->next ?? null;

                if (isset($next_url)) {

                    while ($next_url) {
                        $response2 = Http::withBasicAuth($list->integration?->app_id, $list->integration?->secret)->get($next_url);
                        $result2 = json_decode($response2->body());

                        if ($result2->data) {
                            $personData = array_merge($personData, $result2->data);
                            $next_url = $result2->links->next ?? null;
                        } else {
                            $next_url = null;
                        }
                    }
                }

                //collection of person list relations
                if (isset($personData)) {
                    $phones = [];
                    $customer_id = getCustomerId();

                    foreach ($personData as $pdata) {

                        $relation = $pdata->relationships;
                        $person_id = $relation?->person?->data?->id;
                        $list_id = $relation?->list?->data?->id;

                        //here IntegrationPersonAdd
                        IntegrationListPerson::updateOrCreate(
                            [
                                'person_id'      => $person_id,
                                'customer_id'    => $customer_id,
                                'integration_id' => $list->integration?->id,
                            ],
                            [
                                'customer_id'          => $customer_id,
                                'integration_id'       => $list->integration?->id,
                                'list_id'              => $list_id,
                                'person_id'            => $person_id,
                            ]
                        );

                        $person_details = Http::withBasicAuth($list->integration?->app_id, $list->integration?->secret)->get('https://api.planningcenteronline.com/people/v2/people/' . $person_id);
                        $person_email_details = Http::withBasicAuth($list->integration?->app_id, $list->integration?->secret)->get('https://api.planningcenteronline.com/people/v2/people/' . $person_id . '/emails');
                        $person_phone_details = Http::withBasicAuth($list->integration?->app_id, $list->integration?->secret)->get('https://api.planningcenteronline.com/people/v2/people/' . $person_id . '/phone_numbers');

                        $person_result = json_decode($person_details->body());
                        $person_email_result = json_decode($person_email_details->body());
                        $person_phone_result = json_decode($person_phone_details->body());

                        $person =  $person_result->data?->attributes;
                        $email = count($person_email_result->data) > 0 ?  $person_email_result->data[0]?->attributes?->address : null;
                        $phone = count($person_phone_result->data) > 0 ? $person_phone_result->data[0]?->attributes?->e164 : null;
                     
                       
                        $country = count($person_phone_result->data) > 0 ? Country::whereIso2($person_phone_result->data[0]?->attributes?->country_code)->first() : null;

                        $dial_code = $country->phone_code ?? '';
                        $number = strlen($phone) > 10 ? $phone : $dial_code . $phone;
                        $phones[] = $number;
                        //$network = whatsappExist([$number]);

                        if (isset($phone) && isset($person->name) && $phone != '') {
                           
                            $phone = str_replace('+','',$phone);
                           
                            Contact::updateOrCreate(
                                [
                                    'email' =>  $email,
                                    'phone' => $phone
                                ],
                                [
                                    'customer_id' => getCustomerId(),
                                    'name'       => $person->name,
                                    'email'      => $email,
                                    'phone'      => $phone,
                                    'birthdate'  => $person->birthdate,
                                    'age'        => $person->birthdate ? Carbon::createFromFormat('Y-m-d', $person->birthdate)->age : '',
                                    'country'    => $country->name,
                                    'country_id' => $country->id,
                                    'gender'     => $person->gender,
                                    'avatar'     => $person->avatar,
                                    'list_id'    => $list->list_id,
                                    'list_type'  => 'Planning Center',
                                    'list_people_id' =>  $person_result->data?->id,
                                    'network'    =>  'SMS',

                                ]
                            );
                        }
                    }

                    //Check number exist on whtsapp or not 
                    $response = whatsappExist($phones);
                    if (isset($response)) {
                        foreach ($response as $num => $res) {
                            Contact::wherePhone($num)->update([
                                'network' => $res,
                                'whatsapp_check' => Carbon::now()->format('Y-m-d H:i:s')
                            ]);
                        }
                    }
                }

                return response()->json([
                    'status_code' => 200,
                    'id' => $list->uuid,
                    'message' => 'Contacts are synchronize'
                ]);
            } //planning center
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Internal server error. :'.$e->getMessage()
            ]);
        }
    }
}
