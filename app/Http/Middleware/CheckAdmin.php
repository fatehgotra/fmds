<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = loginUser();

        if ( is_customer()  ||  $user->is_admin == 1 ) {
            return $next($request);
        }

        if( is_team() && $user->is_admin == 0){
            return $next($request);
        }

        return redirect()->back()->with('error', 'You do not have access.');
    }
}
