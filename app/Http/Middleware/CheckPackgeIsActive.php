<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\Customer;

class CheckPackgeIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        // $user_id = loginUser()->id;
      
        // $user = Customer::find($user_id);

        // if ($user && (!$user->email)) {

        if (isPackageActive() == 'no' && is_customer()) {
            return redirect('customer/getting-started/package')->with('warning', 'Please activate your subscription.');
        }

        return $next($request);
    }
}
