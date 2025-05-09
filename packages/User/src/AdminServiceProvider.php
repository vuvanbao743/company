<?php
namespace User;
use Illuminate\Support\ServiceProvider;
use User\Http\Middleware\CheckIfAdminMiddleware;
use User\Http\Middleware\SetAdminGuardAsDefault;
use User\Http\Middleware\CheckAdminPackageEnabled;
use User\Http\Middleware\EnsureAdminAuthenticated;
use User\Http\Middleware\RedirectIfAuthenticatedUser;
use User\Http\Middleware\RedirectIfAuthenticatedAdmin;

class AdminServiceProvider extends ServiceProvider
{
    public function register()
    { 
        
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(base_path('packages/User/resources/views'), 'admin');
        $this->loadViewsFrom(base_path('packages/User/resources/views'), 'user');
        app('router')->aliasMiddleware('admin.auth', EnsureAdminAuthenticated::class);
        app('router')->aliasMiddleware('admin.guest', RedirectIfAuthenticatedAdmin::class);
        app('router')->aliasMiddleware('user.guest', RedirectIfAuthenticatedUser::class);
        app('router')->aliasMiddleware('admin.default.guard', SetAdminGuardAsDefault::class);
        app('router')->aliasMiddleware('check.admin', CheckIfAdminMiddleware::class);
        app('router')->aliasMiddleware('check.admin.package.enabled', CheckAdminPackageEnabled::class);

    }
}
