<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Errors;

use ChurakovMike\LaravelRpcServer\Enums\RpcResponseCodes;
use ChurakovMike\LaravelRpcServer\Exceptions\JsonRpcException;

class ErrorFactory
{
    public function make(\Throwable $exception)
    {
        return (new JsonRpcException(
            $exception->getMessage(),
            $exception->getCode(),
            $exception->getPrevious()
        ))->setStatusCode(RpcResponseCodes::INTERNAL_ERROR);
    }
}
