<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    function handle($request, Closure $next)
    {
        if ($request->user()->level < 3) {
            return $next($request);
        }
        return redirect('/');
    }
}
