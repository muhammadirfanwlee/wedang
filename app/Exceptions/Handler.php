<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        \Illuminate\Auth\Access\AuthorizationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // Useful since some methods cannot be accessed in certain URL extensions
        if ($exception instanceof AuthorizationException) {
            return response()->json([
                'message' => 'Unauthenticated.'
            ], 401);
        }

        // when model with specific id not found
        if ($exception instanceof ModelNotFoundException) {
            $response = 'No query results for id '. $exception->getIds()[0];

            return responder()->error(404, $response)->respond(404);
        }

        return parent::render($request, $exception);
    }
}
