<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $filter                                 = [];
        $filter['name']                         = $request->name;
        $filter['phone']                        = $request->phone;
        $filter['email']                        = $request->email;
        $filter['status']                       = $request->status;

        $customers                              = User::query();
        $customers                              = isset($filter['name']) ? $customers->where(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', '%' . $filter['name'] . '%') : $customers;

        $customers                              = isset($filter['phone']) ? $customers->where('phone', 'LIKE', '%' . $filter['phone'] . '%') : $customers;

        $customers                              = isset($filter['email']) ? $customers->where('email', 'LIKE', '%' . $filter['email'] . '%') : $customers;

        $customers                              = isset($filter['status']) ? $customers->where('status', $filter['status']) : $customers;
        
        $customers                              = $customers->orderBy('id', 'desc')->paginate(20);

        return view('admin.user.list', compact('customers', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'                            => ['required'],
            'phone'                           => ['required'],
            'email'                           => ['required'],
        ];

        $messages = [
            'name.required'                     => 'Please enter name',
            'password.required'                      => 'Please enter Password',
            'phone.required'                         => 'Please enter Phone Number',
            'email.required'                         => 'Please enter Email ID',
        ];

        $this->validate($request, $rules, $messages);

        $user                       = new User;
        $user->name                 = $request->name;
        $user->company_name         = $request->company_name;
        $user->phone                = $request->phone;
        $user->email                = $request->email;
        $user->password             = Hash::make($request->password ?? 'password');
        $user->status               = $request->status; 

        $user->save();  

        return redirect()->route('admin.user.index')->with('success', 'User created successfully');
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
        $customer = User::find($id);

        return view('admin.user.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name'                            => ['required'],
            'phone'                           => ['required'],
            'email'                           => ['required'],
        ];

        $messages = [
            'name.required'                     => 'Please enter name',
            'password.required'                      => 'Please enter Password',
            'phone.required'                         => 'Please enter Phone Number',
            'email.required'                         => 'Please enter Email ID',
        ];

        $this->validate($request, $rules, $messages);

        $user                       = User::find($id);
        $user->name                 = $request->name;
        $user->phone                = $request->phone;
        $user->email                = $request->email;
        $user->status               = $request->status; 

        $user->save();  

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
