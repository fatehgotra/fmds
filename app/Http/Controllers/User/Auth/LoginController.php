<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Team\TeamDashboardController;
use App\Models\Administrator;
use App\Models\Customer;
use App\Models\Team;
use App\Models\User;
use App\Notifications\OTP;
use App\Notifications\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email'         => 'required|email',
            'password'      => 'required|min:6'
        ]);


        $customer_exist = User::whereEmail($request->email)->first();

        if (!is_null($customer_exist)) {

            if( is_null($customer_exist->email_verified_at) ){
                $this->sendOTP();
            }

            if ($customer_exist->status == 0) {

                return redirect()->back()->with('error', 'Your account is disabled. Please contact to administrator.');
            } else if ($customer_exist->delete == 1) {

                return redirect()->back()->with('error', 'Sorry, we already received an account deletion request for your account. Please contact us if you want to reaccess your account.');
            } else {

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                    return redirect()->intended(route('user.dashboard'));
                } else {

                    return $this->sendFailedLoginResponse($request);
                }
            }
        } else {

            return $this->sendFailedLoginResponse($request);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        if( Auth::guard('administrator')->check() ){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
        
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(Request $request)
    {
        if (isset($request->error)) {
            return redirect()->route('user.login')->with('error', $request->error);
        }

        $user = Socialite::driver('facebook')->user();

        if (isset($user)) {

            $customer_exist = Customer::whereEmail($user->email)->first();

            if (is_null($customer_exist)) {
                $customer = Customer::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make($user->id),
                    'remenber_token' => $user->id
                ]);

                if (!is_null($user->avatar)) {

                    $url = $request->input($user->avatar);
                    $imageContents = file_get_contents($user->avatar);
                    $fileName = time() . '.' . 'jpg';
                    $specificPath = "uploads/customer/{$fileName}";
                    Storage::disk('public')->put($specificPath, $imageContents);

                    $customer->avatar = $fileName;
                    $customer->save();
                }

                Administrator::find(1)->notify(new Reminder(
                    'New user registered.',
                     url('/admin/customer').'/'.$customer->id.'/edit',
                    'reminder',
                    $customer->id,
                     ''
                 ));
    
            }

            if (Auth::guard('customer')->attempt(['email' => $user->email, 'password' => $user->id], $request->remember)) {
                return redirect()->intended(route('user.dashboard'));
            }
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        if (isset($request->error)) {
            return redirect()->route('user.login')->with('error', $request->error);
        }

        $user = Socialite::driver('google')->user();
        if (isset($user)) {

            $customer_exist = Customer::whereEmail($user->email)->first();

            if (is_null($customer_exist)) {
                $customer = Customer::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make($user->id),
                    'remenber_token' => $user->id
                ]);

                if (!is_null($user->avatar)) {

                    $url = $request->input($user->avatar);
                    $imageContents = file_get_contents($user->avatar);
                    $fileName = time() . '.' . 'jpg';
                    $specificPath = "uploads/customer/{$fileName}";
                    Storage::disk('public')->put($specificPath, $imageContents);

                    $customer->avatar = $fileName;
                    $customer->save();
                }

                Administrator::find(1)->notify(new Reminder(
                    'New user registered.',
                     url('/admin/customer').'/'.$customer->id.'/edit',
                    'reminder',
                    $customer->id,
                     ''
                 ));
            }

            if (Auth::guard('customer')->attempt(['email' => $user->email, 'password' => $user->id], $request->remember)) {
                return redirect()->intended(route('user.dashboard'));
            }
        }
    }

    public function sendOTP(){

        $otp = rand(111111,999999);
        $user = auth()->user();
        session()->put('otp',$otp);
        $user->notify(new OTP($user));
    }

    public function showverifyForm(){
       
        return view('user.auth.verify-email');
    }

    public function verifyOtp(Request $request){

        if($request->code == session()->get('otp')){
            $user = auth()->user();
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('user.dashboard')->with('success','Email verified successfully');
        } 
       
        return redirect()->route('user.verify-email')->with('error','Invalid OTP');
    }

    public function resendCode(Request $request){
        $this->sendOTP();
        return view('user.auth.verify-email');
    }
}
