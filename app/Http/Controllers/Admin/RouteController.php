<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class RouteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $adminRoutes = collect(Route::getRoutes())->filter(function ($route) {
            return strpos($route->getName(), 'admin.') === 0;
        });

        $routes = $adminRoutes->map(function ($route) {
            return [
                'name' => $route->getName(),
                'uri' => $route->uri(),
                'method' => $route->methods()[0]
            ];
        })->values(); // استفاده از values برای حذف کلیدهای عددی

        return response()->json($routes);
    }
}
