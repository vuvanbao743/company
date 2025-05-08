<?php

namespace MyVendor\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdminAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            if ($request->routeIs('login') || $request->is('login')) {
                return $next($request);
            }
            return redirect()->route('login')->with('error', 'Bạn chưa đăng nhập.');
        }
        return $next($request);
    }
}
