<?php

namespace App\Http\Middleware;

use Closure;

class RoleUserMiddleware
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
        if(Auth::user()->role==1){
           return route('admin.index');
        }
        return $next($request);
    }
}
