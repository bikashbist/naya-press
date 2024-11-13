<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DM_CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::check()){
            if(Auth::user()->role == "super-admin"){
                return $next($request);
            }
            if(Auth::user()->role == $role)
            {
                return $next($request);
            }
            session()->flash('alert-warning', 'You have no authority to access !!!');
            return redirect()->route('dcms.dashboard');
        }
        else{
            session()->flash('alert-warning', 'Please Login !!!');
            return redirect()->route('dcms.login');

        }
    }
}
