<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Team;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\JsonResponse;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords,RedirectsUsers;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = 'customer';

    /*
     * Only guests for "admin" guard are allowed except
     * for logout.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware(['auth:customer','auth:team']);
    // }

    protected function broker()
    {
        $email = $_REQUEST['email'];

        $check_customer = Customer::whereEmail($email)->first();
        if (!is_null($check_customer)) {
            return Password::broker('customers');
        }

        return Password::broker('teams');
    }

    /*
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showResetForm(Request $request)
    {

        $token = $request->route()->parameter('token');

        return view('user.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
     
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);
    }

    function sendResetResponse(Request $request, $response)
    {
        
        $email = $_REQUEST['email'];
        $check_customer = Customer::whereEmail($email)->first();

        if ($check_customer){
            Auth::guard('customer')->login($check_customer);
        }
        else{
            $team = Team::whereEmail($email)->first();
            Auth::guard('team')->login($team);
        }

        return redirect()->route('user.dashboard');
    }


    public function guard()
    {
        $email = $_REQUEST['email'];

        $check_customer = Customer::whereEmail($email)->first();
        if ($check_customer){
            return Auth::guard('customer');
        }
        else{
            return Auth::guard('team');
        }
    }
}
