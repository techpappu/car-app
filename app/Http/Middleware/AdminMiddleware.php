<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
    
        if(auth()->check()){
            if(auth()->user()->role == 1 || auth()->user()->role == 3 || auth()->user()->role == 2){
                return $next($request);
            }
            else{
                Auth::logout();
            }   
        }
         return redirect()->route('login')->with('danger','You do not have admin access');
    }

   
}
