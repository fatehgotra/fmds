<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\Auth\GettingStartedController;
use App\Models\Customer;
use App\Models\UserChatSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class GeneralSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth:customer,team','is_admin']);
    }

    public function index()
    {

        return view('user.general-settings.setting');
    }

    public function whatsappProfile()
    {

        return view('user.general-settings.whatsApp-profile');
    }

    public function teamPermission()
    {
        // $oldSettings = new GettingStartedController();
        // return $oldSettings->settings();

        $customer_id = Auth::user()->id;
        $user = Customer::find($customer_id);

        $role = Role::where('name', 'Team'.$customer_id)->first();

        if (!$role) {
            Role::create(['name' => 'Customer'.$customer_id, 'guard_name' => 'customer', 'customer_id' => $customer_id]);

            Role::create(['name' => 'Team'.$customer_id, 'guard_name' => 'customer', 'customer_id' => $customer_id]);
        }

        $chat_setting = UserChatSetting::where('customer_id', $customer_id)->first();

        return view('user.general-settings.team-permission',compact('user', 'role', 'chat_setting'));
    }

    public function translation()
    {

        return view('user.general-settings.translation');
    }

    public function waysms()
    {

        return view('user.general-settings.waysms');
    }

    public function telnyxGetOtp(Request $request)
    {
              echo '<pre>'; print_r($request->all()); echo '</pre>'; exit();
              
    }

}
