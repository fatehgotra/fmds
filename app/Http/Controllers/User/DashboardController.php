<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Automation;
use App\Models\ChatBox;
use App\Models\ChatBoxMessage;
use App\Models\Contact;
use App\Models\Integration;
use App\Models\IntegrationList;
use App\Models\Reminder;
use App\Models\Team;
use App\Models\Template;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\DatabaseNotification;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataStructure = [
            'Applied' => array_fill(0, 30, 0),
            'Approved' => array_fill(0, 30, 0),
            'Rejected' => array_fill(0, 30, 0),
        ];
        $chart = [
            [
                'name' => 'Applied',
                'data' => $dataStructure['Applied'],
                'color' => '#727cf5',
            ],
            [
                'name' => 'Approved',
                'data' => $dataStructure['Approved'],
                'color' => '#0acf97',
            ],
            [
                'name' => 'Rejected',
                'data' => $dataStructure['Rejected'],
                'color' => '#fa5c7c',
            ]
        ];


       return view('user.dashboard.dashboard',compact(
        'chart',
       ));
    }

    public function teamDsahboardData()
    {

        $cid = loginUser()->id;

        $contacts = Contact::whereTeamId($cid)->count();
        $contact_new = Contact::whereTeamId($cid)->whereDate('created_at', Carbon::today())->count();
        $contact_whatsapp = Contact::whereTeamId($cid)->whereNetwork('Whatsapp')->count();

        $messages = ChatBoxMessage::whereCreator('team')->whereTeamId($cid)->whereSendBy('to')->count();
        $sms_msg = ChatBoxMessage::whereCreator('team')->whereTeamId($cid)->whereSendBy('to')->where('chat_type', 'sms')->count();
        $whatsapp_msg = ChatBoxMessage::whereCreator('team')->whereTeamId($cid)->whereSendBy('to')->where('chat_type', 'whatsapp')->count();

        $unread_msg = ChatBoxMessage::whereCreator('team')->whereTeamId($cid)->whereStatus('0')->count();
        $unread_reminder = Reminder::
             where('creator_id',$cid)
            ->whereCreator('team')
            ->orWhere(['customer_id'=>getCustomerId(),'is_global' => 1])
            ->whereIsRead('0')
            ->count();
        $unread = $unread_msg + $unread_reminder;
     
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $contact_results = DB::table('contacts')
            ->whereTeamId($cid)
            ->select(DB::raw('DAY(created_at) as day, COUNT(*) as contact_count'))
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy(DB::raw('DAY(created_at)'))
            ->get();
        
        $chat_results = DB::table('chat_box_messages')
            ->whereTeamId($cid)
            ->select(DB::raw('DAY(created_at) as day, COUNT(*) as chat_count'))
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy(DB::raw('DAY(created_at)'))
            ->get();
        
        $reminder_results = DB::table('reminders')
            ->whereCreatorId($cid)
            ->select(DB::raw('DAY(created_at) as day, COUNT(*) as reminder_count'))
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy(DB::raw('DAY(created_at)'))
            ->get();
        

        $dataStructure = [
            'Contacts' => array_fill(0, 30, 0),
            'Chat' => array_fill(0, 30, 0),
            'Reminders' => array_fill(0, 30, 0),
        ];
        foreach($contact_results as $contactRes){
            $dayIndex = $contactRes->day-1;
            $dataStructure['Contacts'][$dayIndex] = $contactRes->contact_count;
        }
        foreach($chat_results as $chatRes){
            $dayIndex = $chatRes->day-1;
            $dataStructure['Chat'][$dayIndex] = $chatRes->chat_count;
        }
        foreach($reminder_results as $reminderRes){
            $dayIndex = $reminderRes->day-1;
            $dataStructure['Reminders'][$dayIndex] = $reminderRes->reminder_count;
        }


        $chart = [
            [
                'name' => 'Contacts',
                'data' => $dataStructure['Contacts'],
                'color' => '#727cf5',
            ],
            [
                'name' => 'Chat',
                'data' => $dataStructure['Chat'],
                'color' => '#0acf97',
            ],
            [
                'name' => 'Reminders',
                'data' => $dataStructure['Reminders'],
                'color' => '#eef2f7',
            ]
        ];


        return view('user.dashboard.dashboard', compact(

            'chart',
            'contacts',
            'contact_new',
            'contact_whatsapp',
            'messages',
            'sms_msg',
            'whatsapp_msg',
            'unread',
            'unread_msg',
            'unread_reminder'

        ));
    }

    public function teamIntendLogin($uuid)
    {
        $user = Team::whereUuid($uuid)->first();
        if (!is_null($user)) {
            Auth::guard('team')->login($user);
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function notifyFormActions(Request $request)
    {

        if (count($request->ids) == 0) {
            return redirect()->back()->with('error', 'No selected notification found');
        }
        $notifications =  DatabaseNotification::whereIn('id', $request->ids)->get();

        if ($request->notify_action == 'read') {
            if (count($notifications) > 0) {
                foreach ($notifications as $notify) {
                    $notify->markAsRead();
                }
            }
            return redirect()->back()->with('success', 'Notification marked as read');
        }

        if ($request->notify_action == 'unread') {
            if (count($notifications) > 0) {
                foreach ($notifications as $notify) {
                    $notify->read_at = null;
                    $notify->save();
                }
            }
            return redirect()->back()->with('success', 'Notification marked as unread');
        }

        if ($request->notify_action == 'delete') {
            if (count($notifications) > 0) {
                foreach ($notifications as $notify) {
                    $notify->delete();
                }
            }
            return redirect()->back()->with('success', 'Notification deleted successfully');
        }
    }
}
