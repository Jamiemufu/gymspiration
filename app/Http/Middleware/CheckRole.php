<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request. check user role
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next, $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) 
        {
            return redirect('/');
        }

        return $next($request);
    }
}
