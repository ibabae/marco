<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ForceJson
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->headers->set('Accept', 'application/json');
        $response = $next($request);
        if($response->getStatusCode() == 204){
            return response()->noContent();
        } else{
            $code = match (true) {
                $response->exception instanceof AuthenticationException => ['unauthenticated', Response::HTTP_UNAUTHORIZED],
                $response->exception instanceof AuthorizationException => ['unauthorized', Response::HTTP_FORBIDDEN],
                $response->exception instanceof ModelNotFoundException => ['Not Found', Response::HTTP_NOT_FOUND],
                $response->exception instanceof NotFoundHttpException => ['Not Found', Response::HTTP_NOT_FOUND],
                $response->exception instanceof Exception => ['error', Response::HTTP_UNPROCESSABLE_ENTITY],
                default => ['success', Response::HTTP_OK],
            };

            return response()->json(['status' => $code[0], 'result' => $response->getData()], $code[1]);
        }
    }
}
