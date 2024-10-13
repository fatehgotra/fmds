<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Customer;
use App\Models\User;
use App\Notifications\OTP;
use App\Notifications\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showRegisterForm()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {  
        $this->validate($request, [
            'email'         => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);      

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //toastr.info('Please complete your profile');
            $otp = rand(111111,999999);
            $user = auth()->user();
            session()->put('otp',$otp);
            $user->notify(new OTP($user));

            return redirect()->route('user.dashboard')->with('success', 'Please complete your profile');
        } else {

            return $this->sendFailedRegisterResponse($request);
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

        if (Auth::guard('customer')->check())
        {
            Auth::guard('customer')->logout();
            return redirect()->route('user.login');
        }
    }
}
