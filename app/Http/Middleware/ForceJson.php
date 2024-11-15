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
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

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

        if($request->method() == "DELETE" && $response->status() != 404) {
            return response()->noContent();
        } else{
            $code = match (true) {
                $response->exception instanceof AuthenticationException => ['unauthenticated', Response::HTTP_UNAUTHORIZED],
                $response->exception instanceof AuthorizationException => ['unauthorized', Response::HTTP_FORBIDDEN],
                $response->exception instanceof ModelNotFoundException => ['Not Found', Response::HTTP_NOT_FOUND],
                $response->exception instanceof NotFoundHttpException => ['Not Found', Response::HTTP_NOT_FOUND],

                $response->exception instanceof ValidationException => ['Validation Failed', Response::HTTP_UNPROCESSABLE_ENTITY],
                $response->exception instanceof QueryException => ['Database Error', Response::HTTP_INTERNAL_SERVER_ERROR],
                $response->exception instanceof \PDOException => ['Database Error', Response::HTTP_INTERNAL_SERVER_ERROR],
                $response->exception instanceof Exception => ['error', Response::HTTP_UNPROCESSABLE_ENTITY],

                default => ['success', Response::HTTP_OK],
            };
            $status = ($code[0] === 'success') ? true : false;
            $originalData = $response->getOriginalContent();
            
            return response()->json([
                'status' => $status,
                'data' => $originalData,
            ], $code[1]);
        }
    }
}
