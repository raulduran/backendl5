<?php

namespace App\Http\Middleware;

use Closure;

class AllowOrigin
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
        $response->header('access-control-allow-origin', '*');
        return $response;
    }
}
