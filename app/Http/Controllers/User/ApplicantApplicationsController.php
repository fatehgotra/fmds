<?php

namespace App\Http\Controllers\User;

use App\Models\Applications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplicantApplications;

class ApplicantApplicationsController extends Controller
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
        $applications = ApplicantApplications::whereUserId(auth()->user()->id)->paginate(10);

        $applications->through(function ($application) {
            $data = $application->data;
            $form = $application->application;
            $statuses = $application->statues();
            $status = $statuses->orderBy('id','desc')->first();
            
            return [
                'id'         => $application->id,
                'uuid'       => $application->uuid,
                'applicant'  => $data?->forename.' '.$data?->othername.' '.$data?->surname,
                'name'       => $form?->name,
                'status'     => ucwords($status?->status),
                'created_at' => $application->created_at
            ];
        });

        return view('user.applied.list', compact('applications'));
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
