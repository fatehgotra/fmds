<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\URL;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $countries = Country::oldest('name')->get();
        $admin          = User::whereUuid($uuid)->first();
        $admin->avatar  = isset($admin->avatar) ? asset('storage/uploads/user/' . $admin->avatar) : URL::to('assets/images/users/avatar-icon.png');
        return view('user.settings.my-account', compact('admin', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          =>  'required'
        ]);

       
        $admin  = User::whereUuid($id)->first();

        if (is_null($admin)) {
            return redirect()->back()->with('error', 'something went wrong, user not found');
        }
        $admin->name            = $request->name;
        $admin->phone           = $request->phone;
        $admin->dob             = $request->dob;
        $admin->address         = $request->address;

        if ($request->hasfile('avatar')) {

            $image      = $request->file('avatar');

            $name       = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('uploads/user/', $name, 'public');

            if (isset($admin->avatar)) {

                $path   = 'public/uploads/user/' . $admin->avatar;

                Storage::delete($path);
            }

            $admin->avatar = $name;
        }

        $admin->save();

        return redirect()->route('user.my-account.edit', $admin->uuid)->with('success', 'Account updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid) {}

    public function deleteAccount()
    {
        User::whereUuid(loginUser()->uuid)->delete();
        return redirect()->route('user.login')->with('success', 'Account deleted successfully');
    }
}
