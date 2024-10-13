<?php

namespace App\Http\Controllers\User;

use App\Models\Applications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $applications = Applications::get();
        return view('user.application.list', compact('applications'));
    }

    public function initiateApplication(Request $request)
    {

        $id = $request->application_id;
        $application = Applications::find($id);
        if( is_null($application) ){
            return redirect()->back()->with('error','Application not found');
        }
        session()->put('application',$application);
        session()->put('application_id',$id);
        switch ($id) {
            case 1:
                return view('user.application.registration-practice-licence-internship.personal-info',compact('application'));
                break;
            case 2:
                return redirect()->back()->with('error','Application not ready yet.');
                break;
            case 3:
                return redirect()->back()->with('error','Application not ready yet.');
                break;
            case 4:
                return redirect()->back()->with('error','Application not ready yet.');
                break;
            case 5:
                return redirect()->back()->with('error','Application not ready yet.');
                break;
            default:
        }

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
    public function show(Applications $applications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applications $applications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applications $applications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applications $applications)
    {
        //
    }
}
