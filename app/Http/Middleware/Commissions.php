<?php

namespace App\Http\Middleware;

use Closure;

class Commissions
{
    function handle($request, Closure $next)
    {
        if (getStore() == $request->route('store') || isAdmin()) {
            return $next($request);
        }

        return back();
    }
}
