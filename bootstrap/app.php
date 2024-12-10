<?php

use App\Http\Middleware\ForceJson;
use App\Http\Middleware\HandleApiMiddleware;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RolePermission;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['api', 'auth:api','throttle:10,1'])->prefix('api')->group(function () {
                Route::name('admin.')->prefix('admin/')->middleware([RolePermission::class])->group(base_path('routes/admin-routes.php'));
                Route::name('user.')->prefix('user/')->group(base_path('routes/user-routes.php'));
            });
        }

    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            ForceJson::class,
            HandleApiMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
