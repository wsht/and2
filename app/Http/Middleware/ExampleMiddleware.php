<?php

namespace App\Http\Middleware;

use Closure;

class ExampleMiddleware
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
        if($request->input('age') <=200)
        {
            return redirect()->route('profile1');
        }

        return $next($request);
    }
}
