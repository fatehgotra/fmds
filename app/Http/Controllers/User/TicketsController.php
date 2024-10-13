<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\TicketMessage;
use App\Models\Tickets;
use App\Notifications\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Ticket;

class TicketsController extends Controller
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
        $customer_id = getCustomerId();
        $tickets = Tickets::whereCustomerId($customer_id)->orderBy('id', 'desc')->paginate(10);
        $open = Tickets::whereCustomerId($customer_id)->whereStatus('1')->count();

        return view('user.tickets.list', compact('tickets', 'open'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tickets.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'department' => 'required',
            'priority'  => 'required',
        ], [
            'title.required' => 'Please enter subject of ticket.'
        ]);


        $customer_id = loginUser()->getTable() == 'teams' ? Auth::guard('team')->user()->customer_id : Auth::guard('customer')->id();

        $ticket = Tickets::create([
            'customer_id' => $customer_id,
            'title'       => $request->title,
            'department'  => $request->department,
            'priority'    => $request->priority
        ]);

        if (!is_null($request->message)) {
            $message =  TicketMessage::create([
                'ticket_id' => $ticket->id,
                'by'        => 'customer',
                'message'   => $request->message
            ]);
        }

        Administrator::find(1)->notify(new Reminder(
           'New Ticket has been raised',
            url('/admin/tickets').'/'.$ticket->uuid,
           'reminder',
            $ticket->id,
            ''
        ));

        if ($request->hasFile('attachment')) {

            $image      = $request->file('attachment');

            $name       = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('uploads/ticket/', $name, 'public');

            TicketMessage::find($message->id)->update(['attachment' => $name]);
        }

        return redirect()->route('user.ticket.index')->with('info', 'Ticket created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $ticket = Tickets::whereUuid($uuid)->first();
        if (is_null($ticket)) {
            return redirect()->back()->with('error', 'Ticket not found');
        }
        return view('user.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $this->validate($request, [
            'message' => 'required'
        ], [
            'message.required' => 'Please enter message'
        ]);

        $ticket = Tickets::whereUuid($uuid)->first();
    
        if (is_null($ticket)) {
            return redirect()->back()->with('error', 'Ticket not found');
        }

        $message = TicketMessage::create([
            'ticket_id' => $ticket->id,
            'by'        => 'customer',
            'message'   => $request->message
        ]);

        if ($request->hasFile('attachment')) {

            $image      = $request->file('attachment');

            $name       = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('uploads/ticket/', $name, 'public');

            TicketMessage::find($message->id)->update(['attachment' => $name]);
        }

        Administrator::find(1)->notify(new Reminder(
            'New reply received on ticket',
             url('/admin/tickets').'/'.$ticket->uuid,
            'reminder',
             $ticket->id,
             ''
         ));

        return redirect()->back()->with('info', 'Ticket response added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $tickets)
    {
        //
    }
}
