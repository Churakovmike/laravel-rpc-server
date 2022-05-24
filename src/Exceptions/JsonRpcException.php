<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Exceptions;

use ChurakovMike\LaravelRpcServer\Enums\RpcResponseCodes;

class JsonRpcException extends \Exception
{
    private RpcResponseCodes $statusCode = RpcResponseCodes::INTERNAL_ERROR;

    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function setStatusCode(RpcResponseCodes $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getStatusCode(): RpcResponseCodes
    {
        return $this->statusCode;
    }
}
