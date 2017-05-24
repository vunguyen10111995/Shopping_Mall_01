<?php

namespace App\Http\Middleware;

use Closure;

class checkLevel
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

        if (!$request->user()->isAdmin()) {
            redirect ('/');
        }

        return $next($request);
    }
}
