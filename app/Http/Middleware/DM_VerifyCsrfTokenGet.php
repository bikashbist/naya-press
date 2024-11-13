<?php

namespace App\Http\Middleware;

use Closure;

class DM_VerifyCsrfTokenGet
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
        // check matching token from GET
        $sessionToken = $request->session()->token();
        $token = $request->input('_token');
        if (! is_string($sessionToken) || ! is_string($token) || !hash_equals($sessionToken, $token) ) {
            throw new \Exception('CSRF token mismatch exception');
        }

        return $next($request);
    }
}
