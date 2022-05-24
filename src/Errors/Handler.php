<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Errors;

use ChurakovMike\LaravelRpcServer\Requests\JsonRpcRequest;
use ChurakovMike\LaravelRpcServer\Responses\ErrorResponse;

class Handler
{
    public function __construct(private readonly ErrorFactory $errorFactory) {}

    public function render(JsonRpcRequest $request, \Throwable $exception): ErrorResponse
    {
        $error = $this->errorFactory->make($exception);

        return new ErrorResponse($request, $error);
    }
}
