<?php

namespace App\Http\Middleware;

use Closure;

class Homecheck
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
        if (\Auth::guard()->check()){
            return redirect('/home/login');
        }
        return $next($request);
    }
}
