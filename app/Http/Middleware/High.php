<?php

namespace App\Http\Middleware;

use Closure;

class High
{
    function handle($request, Closure $next)
    {
        if ($request->user()->store_id == 1) {
            return $next($request);
        }
        return redirect('/');
    }
}
