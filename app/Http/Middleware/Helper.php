<?php

namespace App\Http\Middleware;

use Closure;

class Helper
{
    function handle($request, Closure $next)
    {
        if ($request->user()->store_id == 1 || $request->user()->isHelper) {
            return $next($request);
        }
        return redirect('/');
    }
}