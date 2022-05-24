<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Errors;

class ErrorFactory
{
    public function make(\Throwable $exception)
    {
        return $exception;
    }
}
