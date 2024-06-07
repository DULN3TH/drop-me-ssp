<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleValidationMiddleware
{
    public function handle(Request $request, Closure $next)
    {

//        dd(auth()->user());
        return $next($request);
    }
}
