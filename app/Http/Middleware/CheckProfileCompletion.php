<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\Customer;

class CheckProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if ($user && is_null($user->email_verified_at) ) {                  
            return redirect()->route('user.verify-email')->with('warning', 'Please complete your profile.');
        }

        return $next($request);
    }
}
