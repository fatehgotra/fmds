<?php

use App\Models\Administrator;
use App\Models\ChatBoxMessage;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\IntegrationList;
use App\Models\Media;
use App\Models\Tags;
use App\Models\Tickets;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Ticket;
use Spatie\Permission\Models\Role;

function loginUser()
{

    return Auth::user();
}

function getCustomerId()
{
    return loginUser()->getTable() == 'teams' ? Auth::guard('team')->user()->customer_id : Auth::guard('customer')->id();
}


function getCustomer()
{
    return loginUser()->getTable() == 'teams' ? Customer::find(getCustomerId()) : Auth::guard('customer')->user();
}

function is_customer()
{
    return loginUser()->getTable() == 'customers' ? true : false;
}

function getTimezone()
{          
    return getCustomer()->country->timezone ?? config('app.timezone');
    return loginUser()->getTable() == 'teams' ? Customer::find(getCustomerId()) : Auth::guard('customer')->user();
}

function is_team()
{
    return loginUser()->getTable() == 'teams' ? true : false;
}

function is_admin(){
  return loginUser()->getTable() == 'teams' && loginUser()->is_admin == 1 ? true : false;
}

if (!function_exists('checkProfileCompleted')) {

    function checkProfileCompleted()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (empty($user->phone)) {
                return redirect('customer/getting-started')->with('warning', 'Please complete your profile.');
            }
        }
    }
}
    
if (!function_exists('checkProfilePackage')) {

    function checkProfilePackage()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (empty($user->company_name) || empty($user->company_name)) {
                return false;
            }else{
                 return true;;
            }
        }
    }
}

if (!function_exists('checkProfileSetting')) {

    function checkProfileSetting()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (empty($user->package_id)) {
                return false;
            }else{
                 return true;;
            }
        }
    }
}


function sidebarNotifications()
{
    $notifications = loginUser()->notifications()->latest()->take(20)->get();
    return $notifications;
}
function unreadNotifications()
{
    $notifications = loginUser()->notifications()->whereNull('read_at');
    $count = $notifications->count();
    $notifications->latest()->take(20)->get();
    return [
        'count' => $count,
        'notifications' => $notifications
    ];
}

//Admin Notifications
function sidebarAdminNotifications()
{
    $notifications = Administrator::find(1)->notifications()->latest()->take(20)->get();
    return $notifications;
}
function unreadAdminNotifications()
{
    $notifications = Administrator::find(1)->notifications()->whereNull('read_at');
    $count = $notifications->count();
    $notifications->latest()->take(20)->get();
    return [
        'count' => $count,
        'notifications' => $notifications
    ];
}


function packageExpireDaysLeft()
{
    $start_date = new DateTime(loginUser()->package_start_date);
    $end_date = new DateTime(loginUser()->package_end_date);
    $now = new DateTime();
    $interval = $now->diff($end_date);

    if ($start_date > $end_date) {
        return "Expired " . $interval->days . ' Days ago';
    }

    if ($interval->days == 0) {
        return ' Today';
    }
    return $interval->days . ' Days';
}

function isPackageActive()
{
    $start_date = new DateTime(loginUser()->package_start_date);
    $end_date = new DateTime(loginUser()->package_end_date);
    $interval = $start_date->diff($end_date);

    if ($start_date > $end_date) {
        return 'no';
    }
    return 'yes';
}
function lists($all = true)
{
    if ($all)
        $lists = IntegrationList::whereCustomerId(getCustomerId())->orderBy('id', 'desc')->get(['list_name', 'list_id', 'id']);
    else
        $lists = IntegrationList::whereCustomerId(getCustomerId())->where('in_list', '1')->orderBy('id', 'desc')->get(['list_name', 'list_id', 'id', 'uuid']);

    return $lists;
}
function listTags()
{
    return Tags::whereCustomerId(getCustomerId())->orWhere('team_id', loginUser()->id)->orderBy('id', 'desc')->get();
}

function whatsappExist($numbers)
{

    //     $hardResponse = '{
    //     "contacts": [
    //         {
    //             "input": "918825073822",
    //             "status": "valid",
    //             "wa_id": "918825073822@s.whatsapp.net"
    //         },
    //          {
    //             "input": "+27118881440",
    //             "status": "valid",
    //             "wa_id": "+27118881440@s.whatsapp.net"
    //         },
    //         {
    //             "input": "+918716070335",
    //             "status": "invalid"
    //         }
    //             ]
    //     }';
    //   $response = json_decode($hardResponse);


    $fields = '{"blocking":"wait",
        "force_check":true,
        "contacts":["' . implode('","', $numbers) . '"]
        }';


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.whapi.cloud/contacts',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $fields,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer VkZIzdla2dLcayHffv6ThQxWISv5f3iB',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response);

    if (isset($response->contacts)) {

        $result = [];
        foreach (collect($response->contacts) as $res) {
            $result[$res->input] = $res->status == "valid" ? 'Whatsapp' : 'SMS';
        }
        return $result;
    }
}

function get_media($path)
{
    if (env('STORAGE_ACCESS') == 's3') {
        return Storage::disk('s3')->url($path);
    } else {
        return asset('storage' . $path);
    }
}

function checkTicket()
{
    $ticket = Tickets::whereCustomerId(loginUser()->id)->whereStatus('1')->first();
    return is_null($ticket) ? false : true;
}

function activeNotice()
{
    $notice = loginUser()->notifications()->where('read_at', null)->first();
    return !is_null($notice) ? true : false;
}

function activeMessage()
{
    $id = loginUser()->id;
    $message = ChatBoxMessage::whereStatus(0)->whereCustomerId($id)->orWhere('team_id', $id)->first();
    return !is_null($message) ? true : false;
}

function teamCan($id = null)
{
    $role = Role::where('name', 'Team' . (is_null($id) ? getCustomerId() : $id))->first();
    return ($role->permissions->pluck('name')->toArray());
}

function enableTeam()
{
    if (!in_array('Enable Team Members', teamCan())) {
        return false;
    } else {
        return true;
    }
}

function checkAccess($action)
{
    if (!in_array($action, teamCan()) && loginUser()->getTable() == 'teams' && loginUser()->is_admin == 0) {
        return false;
    } else {
        return true;
    }
}

function reset2fa()
{
    if (session()->get('auth.2fa_verified')) {
        session()->remove('auth.2fa_verified');
    }
    if (session()->get('new_2fa')) {
        session()->remove('new_2fa');
    }
}

function all_countries(){
    $countries = Country::get(['name','id']);
    return $countries;
}

function app_value($name,$key){

 if( !is_null( session()->get($name) ) ){
    $ses = session()->get($name);
    return $ses[$key] ?? '';
 } else {
    return '';
 }

}