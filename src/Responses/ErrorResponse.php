<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Responses;

use ChurakovMike\LaravelRpcServer\Exceptions\JsonRpcException;
use ChurakovMike\LaravelRpcServer\Requests\JsonRpcRequest;

class ErrorResponse implements \JsonSerializable
{
    public function __construct(
        private readonly JsonRpcRequest $request,
        private readonly JsonRpcException $exception,
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'jsonrpc' => '2.0',
            'error' => [
                'code' => $this->exception->getStatusCode(),
                'message' => $this->exception->getMessage(),
            ],
            'id' => $this->request->getId(),
        ];
    }
}
