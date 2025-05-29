<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(Router $router): void
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}

