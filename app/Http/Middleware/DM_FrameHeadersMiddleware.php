<?php

namespace App\Http\Middleware;

use Closure;

class DM_FrameHeadersMiddleware
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
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        // $response->headers->set('X-Frame-Options', 'ALLOW FROM http://moe.sricnepal.org.np/');
        return $response;
    }
}
