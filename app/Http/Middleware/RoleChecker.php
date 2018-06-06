<?php

namespace App\Http\Middleware;

use Gate;
use Closure;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Gate::allows($role)){
            return $next($request);
        }

        return back();
    }
}