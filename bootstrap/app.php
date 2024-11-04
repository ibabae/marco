<?php

use App\Http\Middleware\Authorize;
use App\Http\Middleware\CorsMiddleware;
use App\Http\Middleware\ForceJson;
use App\Http\Middleware\LogActivity;
use App\Http\Middleware\RolePermission;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;
use Mollsoft\LaravelTronModule\Facades\Tron;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['api', 'auth:api','throttle:10,1'])->prefix('api')->group(function () {
                Route::name('admin.')->prefix('admin/')->group(base_path('routes/admin-routes.php'));
                Route::name('user.')->prefix('user/')->group(base_path('routes/user-routes.php'));
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware
            ->alias([

            ])
            ->api(prepend: [
                RolePermission::class,
                ForceJson::class,
                LogActivity::class,
            ])
            ->alias([
                // 'authorize' => Authorize::class,
            ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
