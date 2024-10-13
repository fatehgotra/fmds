<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwofaCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
        $user = loginUser();
        if(!$request->session()->get('auth.2fa_verified') && $user->two_factor_secret && !$request->session()->get('new_2fa')){
            return redirect()->route('user.two-factor.auth');
        } 
        return $next($request);
       
    }
}
