<?php

namespace App\Http\Middleware;

use Closure;

class NonCheckup
{
    function handle($request, Closure $next)
    {
        if ($request->user()->level < 7) {
            return $next($request);
        }
        return redirect('/');
    }
}
