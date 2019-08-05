<?php

namespace App\Http\Middleware;

use Closure;

class Test
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
        $request->route()->setParameter('id', 9999);
        $response =  $next($request);
        $response->header('X-Header-One', 'Header Value');
        return $response;
    }
}
