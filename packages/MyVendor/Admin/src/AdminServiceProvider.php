<?php
namespace MyVendor\Admin;
use Illuminate\Support\ServiceProvider;
use MyVendor\Admin\Http\Middleware\CheckIfAdminMiddleware;
use MyVendor\Admin\Http\Middleware\SetAdminGuardAsDefault;
use MyVendor\Admin\Http\Middleware\CheckAdminPackageEnabled;
use MyVendor\Admin\Http\Middleware\EnsureAdminAuthenticated;
use MyVendor\Admin\Http\Middleware\RedirectIfAuthenticatedUser;
use MyVendor\Admin\Http\Middleware\RedirectIfAuthenticatedAdmin;

class AdminServiceProvider extends ServiceProvider
{
    public function register()
    { 
        
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(base_path('packages/MyVendor/Admin/resources/views'), 'admin');
        $this->loadViewsFrom(base_path('packages/MyVendor/Admin/resources/views'), 'user');
        app('router')->aliasMiddleware('admin.auth', EnsureAdminAuthenticated::class);
        app('router')->aliasMiddleware('admin.guest', RedirectIfAuthenticatedAdmin::class);
        app('router')->aliasMiddleware('user.guest', RedirectIfAuthenticatedUser::class);
        app('router')->aliasMiddleware('admin.default.guard', SetAdminGuardAsDefault::class);
        app('router')->aliasMiddleware('check.admin', CheckIfAdminMiddleware::class);
        app('router')->aliasMiddleware('check.admin.package.enabled', CheckAdminPackageEnabled::class);

    }
}
