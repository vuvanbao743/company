<?php

namespace MyVendor\Admin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SetUserGuardAsDefault
{
    public function handle($request, Closure $next)
    {
        Auth::shouldUse('user');
        return $next($request);
    }
}
