<?php

namespace App\Http\Middleware;

use Closure;

class Helper
{
    function handle($request, Closure $next)
    {
        if ($request->user()->level < 3 || $request->user()->isHelper) {
            return $next($request);
        }
        return redirect('/');
    }
}
