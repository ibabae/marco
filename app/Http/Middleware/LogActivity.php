<?php

namespace App\Http\Middleware;

use App\Models\Activity;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // چک کنید که کاربر وارد شده باشد
        if (auth()->check()) {
            // فعالیت کاربر را ثبت کنید
            Activity::create([
                'user_id' => auth()->id(),
                'method' => $request->method(),
                'address' => $request->path(),
                'description' => $request->fullUrl(),
                'ip' => $request->ip(),
                'parameters' => json_encode($request->all()),
            ]);
        }

        return $response;
    }
}
