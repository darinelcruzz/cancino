<?php

namespace App\Http\Middleware;

use Closure;

class High
{
    function handle($request, Closure $next)
    {
        if ($request->user()->store_id == 1 || $request->user()->username == 'dulce') {
            return $next($request);
        }
        return redirect('/');
    }
}
