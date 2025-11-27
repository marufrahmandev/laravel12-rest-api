<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // $middleware->api(prepend: [
        //     \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        // ]);

        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {




        $exceptions->render(function (Throwable $e, Request $request) {

            $status = 500; // default

            if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                $status = 401;
            }
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                return response()->json([
                    'status' => false,
                    'errors' => $e->errors()
                ], 422);
            }

            if ($e instanceof \Illuminate\Auth\AuthenticationException) {
                $status = 401;
            }

            if ($e instanceof \Illuminate\Auth\Access\AuthorizationException) {
                $status = 403;
            }

            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                $status = 404;
            }

            if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                $status = 404;
            }

            if ($e instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException) {
                $status = 429;
            }

            return response()->json([
                'status'  => false,
                'error'   => class_basename($e),
                'message' => app()->environment('production') ? 'Server Error' : $e->getMessage()
            ], $status);
        });
    })->create();
