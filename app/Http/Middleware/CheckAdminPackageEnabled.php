<?php
namespace User\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

class CheckAdminPackageEnabled
{
    public function handle($request, Closure $next)
    {
        try {
            if (!Setting::get('admin_package_enabled', false)) {
                if (Route::currentRouteName() !== 'home') {
                    return redirect()->route('home')->with('error', 'Chức năng này đang bảo trì.');
                }
            }
        } catch (\Exception $e) {
            if (Route::currentRouteName() !== 'home') {
                return redirect()->route('home')->with('error', 'Đã xảy ra lỗi hệ thống.');
            }
        }

        return $next($request);
    }
}
