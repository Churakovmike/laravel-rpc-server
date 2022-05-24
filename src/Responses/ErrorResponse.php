<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Responses;

use ChurakovMike\LaravelRpcServer\Requests\JsonRpcRequest;

class ErrorResponse implements \JsonSerializable
{
    public function __construct(
        private readonly JsonRpcRequest $request,
        private readonly \Throwable $exception,
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'jsonrpc' => '2.0',
            'error' => [
                'code' => 123,
                'message' => 'test error message',
            ],
            'id' => 1,
        ];
    }
}
