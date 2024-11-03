<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $model = ''): Response
    {
        $route = $request->route();
        $name = $route->getActionName();
        $name = explode('@', $name)[1] ?? $name;
        if (! $request->user()->hasRole('admin') AND !$request->user()->hasRole('user')) {
            $model = last($route->parameters()) ?: $model;
            if ($model instanceof Model) {
                if ($model instanceof User && $model->id != $request->user()->id) {
                    throw new AuthorizationException('شما به این آیتم دسترسی ندارید');
                } elseif ($model->user()->isNot($request->user())) {
                    throw new AuthorizationException('شما به این آیتم دسترسی ندارید');
                }
            } else {
                Gate::authorize($name, $model);
            }
        }

        return $next($request);
    }
}
