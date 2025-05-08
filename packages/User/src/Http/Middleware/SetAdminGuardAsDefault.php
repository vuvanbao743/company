<?php

namespace User\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SetAdminGuardAsDefault
{
    public function handle($request, Closure $next)
    {
        Auth::shouldUse('admin'); 
        return $next($request);
    }
}
