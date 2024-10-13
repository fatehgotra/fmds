<?php

namespace App\Http\Controllers\Admin;
use App\Models\Customer;
use Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }

    public function index()
    {
        return view('admin.dashboard.dashboard');
    }

    public function customerIntendLogin($uuid)
    {
        $user = User::whereUuid($uuid)->first();
        if (!is_null($user)) {
            Auth::guard('web')->login($user);
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
