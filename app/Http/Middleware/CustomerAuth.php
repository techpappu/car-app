<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       // return $next($request);
       $isAuthenticatedUser = (Auth::check() && Auth::user()->role == 4);
  
       //This will be excecuted if the new authentication fails.
     if (!$isAuthenticatedUser)
         return redirect('/login');
     return $next($request);
    }
}
