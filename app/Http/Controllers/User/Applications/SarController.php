<?php

namespace App\Http\Controllers\User\Applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function personalInfo(Request $request)
    {
        $inputs = $request->except('_token');

        if (!isset($request->back) && isset($inputs))
            session()->put('personal_info', $inputs);
        return view('user.application.student-annual-registration.registration');
    }

    public function Registration(Request $request)
    {
        $inputs = $request->except('_token');

        if (!isset($request->back) && isset($inputs))
            session()->put('registration', $inputs);
        return view('user.application.student-annual-registration.registration');
    }
}
