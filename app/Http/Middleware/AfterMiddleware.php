<?php

namespace App\Http\Middleware;

use Closure;

class AfterMiddleWare
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        var_dump($response);

        return $response;
    }
}