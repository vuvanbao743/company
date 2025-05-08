<?php

namespace MyVendor\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            if (!in_array($user->role, [1, 2])) {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
 