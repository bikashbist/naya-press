<?php

namespace App\Http\Middleware;
use App\DM_UnauthorizedException;
use Auth;
use Closure;

class DM_CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (app('auth')->guest()) {
            throw DM_UnauthorizedException::notLoggedIn();
        }

        if(Auth::user()->role_super == 1){
            return $next($request);
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if(Auth::user()->checkPermission($permission)){
                return $next($request);
            }
            else {
                session()->flash('alert-warning', 'You have no authority to access !!!');
                return redirect()->back();
            }
        }
    }
}
