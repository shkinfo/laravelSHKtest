<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                 ->namespace($this->namespace)
                 ->group(base_path('routes/web.php'));

            Route::prefix('api')
                 ->middleware('api')
                 ->namespace($this->namespace)
                 ->group(base_path('routes/api.php'));
        });
    }

    protected function configureRateLimiting()
    {
        \Illuminate\Support\RateLimiter::for('api', function (Request $request) {
            return \Illuminate\Support\Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
