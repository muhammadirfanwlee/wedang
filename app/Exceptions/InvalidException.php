<?php

namespace App\Exceptions;
use Illuminate\Http\JsonResponse;

use Exception;

class InvalidException extends Exception
{
    public function __construct(
        private string $response = 'Something went wrong.'
    ){}

    public function render($request): JsonResponse
    {
        return responder()->error(500, $this->response)->respond(500);
    }
}
