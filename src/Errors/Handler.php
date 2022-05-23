<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Errors;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Handler
{
    public function __construct(private readonly ErrorFactory $errorFactory) {}

    public function render(Request $request, \Throwable $exception): Response
    {

    }
}
