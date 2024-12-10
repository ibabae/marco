<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\QueryException;

class HandleApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if($response->getStatusCode() >= 400) {
            return $this->handleException($response->exception);
        }
        return $this->formatResponse($response);
    }

    /**
     * Handle exceptions and return a JSON response.
     */
    protected function handleException(Throwable $exception)
    {
        $code = match (true) {
            $exception instanceof NotFoundHttpException
                or $exception instanceof ModelNotFoundException
                => ['error', Response::HTTP_NOT_FOUND],

            $exception instanceof ValidationException
                => ['error', Response::HTTP_UNPROCESSABLE_ENTITY],

            $exception instanceof QueryException
                or $exception instanceof \PDOException
                => ['error', Response::HTTP_INTERNAL_SERVER_ERROR],

            default => ['error', Response::HTTP_INTERNAL_SERVER_ERROR], // Default to 500 if error type is unknown
        };

        return response()->json([
            'status' => $code[0],
            'message' => $exception->getMessage(),
        ], $code[1]);
    }

    /**
     * Format a successful response.
     */
    protected function formatResponse($response)
    {
        if(Str::startsWith(\request()->getRequestUri(), ['/api/docs', '/api/telescope'])){
            return $response;
        }
        $responseData = [
            'status' => 'success',
        ];

        $responseData['message'] = $response->getData()->message ?? null;
        
        if (!is_null($response->getData()->columns ?? null)) {
            $responseData['columns'] = $response->getData()->columns;
        }
        $responseData['data'] = $response->getData()->data ?? $response->getData();
        return response()->json($responseData, $response->status());

    }

}
