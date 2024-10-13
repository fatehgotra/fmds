<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\MessageCost;
use Illuminate\Http\Request;
use App\Models\Package;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }
    public function index()
    {
        $packages = Package::latest()->get(); 
        $costs = MessageCost::latest()->get();
        return view('admin.pricing.list', compact('packages','costs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $country = Country::find($request->country);
        $check = MessageCost::whereCountryId($request->country)->first();
        if( !is_null($check) ){
            return redirect()->back()->with('error','This country cost already added.Please delete or modify existing one');
        }

        MessageCost::create([
            'country'    => $country->name,
            'country_id' => $country->id,
            'code'       => $country->phone_code,
            'local_sms'  => $request->local_sms,
            'global_sms' => $request->global_sms,
            'service'    => $request->service,
            'marketing'  => $request->marketing,
            'utility'    => $request->utility,
            'auth'       => $request->auth 
        ]);

        return redirect()->back()->with('success','Message cost added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pricing.edit');
    }

    public function msgCost()
    {
        return view('admin.pricing.msgCost');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $country = Country::find($request->country);

        MessageCost::find($id)->update([
            'country'    => $country->name,
            'country_id' => $country->id,
            'code'       => $country->phone_code,
            'local_sms'  => $request->local_sms,
            'global_sms' => $request->global_sms,
            'service'    => $request->service,
            'marketing'  => $request->marketing,
            'utility'    => $request->utility,
            'auth'       => $request->auth 
        ]);

        return redirect()->back()->with('success','Message cost updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MessageCost::find($id)->delete();
        return redirect()->back()->with('success','Message cost deleted successfully');
    }
}
