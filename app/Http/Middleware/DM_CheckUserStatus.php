<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DM_CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if(Auth::check() && Auth::user()->status != 1){
            Auth::logout();
            session()->flash('alert-warning', 'You are Inactive User. Please Contact Admin');
            return redirect()->route('dcms.login');
        }
        return $response;
    }
}
