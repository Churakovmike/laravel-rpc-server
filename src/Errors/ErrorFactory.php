<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Errors;

use ChurakovMike\LaravelRpcServer\Exceptions\JsonRpcException;

class ErrorFactory
{
    public function make(JsonRpcException $exception): array
    {
        return [];
    }
}
