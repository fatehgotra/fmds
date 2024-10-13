<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketMessage;
use App\Models\Tickets;
use App\Notifications\Reminder;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }
    public function index(Request $request)
    {
        $tickets = Tickets::query();

        if (isset($request->user)) {
            $user = $request->user;

            $tickets = $tickets->whereHas('customer', function ($q) use ($user) {
                return $q->where('name', 'like', '%' . $user . '%');
            });
        }

        if (isset($request->status)) {

            $tickets = $tickets->where('status', $request->status);
        }

        $tickets = $tickets->orderBy('id', 'desc')->paginate(10);

        $open = Tickets::whereStatus('1')->count();

        return view('admin.tickets.list', compact('tickets', 'open'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('admin.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
            'by'        => 'admin',
            'message'   => $request->message
        ]);

        $ticket->customer->notify(new Reminder(
            'New response received on ticket',
             url('/customer/ticket').'/'.$ticket->uuid,
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

        return redirect()->back()->with('info', 'Ticket response added successfully');
    }

    public function changeStatus(Request $request)
    {
    
        $ticket = Tickets::whereUuid($request->uuid)->first();
        $ticket->status = $request->status;
        $ticket->save();
      
        $ticket->customer->notify(new Reminder(
            'Ticket has been'.( ($request->status == 0) ? 'closed' : 'Reopen' ),
             url('/customer/ticket').'/'.$ticket->uuid,
            'reminder',
             $ticket->id,
             ''
         ));

        return redirect()->back()->with('info', 'Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {

        Tickets::whereUuid($uuid)->delete();

        return redirect()->back()->with('info', 'Ticket deleted successfully');
    }
}
