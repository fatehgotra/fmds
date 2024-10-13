<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Team;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /*
     * Only guests for "superadmin" guard are allowed except
     * for logout.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware(['auth:customer','auth:team']);
    // }

    public function showLinkRequestForm()
    { 
        return view('user.auth.passwords.email');
    }

    protected function broker()
    {
        $email = $_REQUEST['email'];
       
        $check_customer = Customer::whereEmail($email)->first();
        if (!is_null($check_customer)) {
            return Password::broker('customers');
        }

            return Password::broker('teams');
    }

    public function guard()
    {
        $email = $_REQUEST['email'];

        $check_customer = Customer::whereEmail($email)->first();
        if ($check_customer)
            return Auth::guard('customer');
        else
            return Auth::guard('team');
    }
}
