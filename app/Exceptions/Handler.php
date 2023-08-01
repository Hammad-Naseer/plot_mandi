<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // This Function Added For Too Many API Request 
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ThrottleRequestsException) {
            return response()->json([
                'error' => 'Too many requests. Please try again later.',
            ], 429);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json(['error' => 'Token Expired.', 'code' => 401], 401);
        }
        

        return parent::render($request, $exception);
    }

}
