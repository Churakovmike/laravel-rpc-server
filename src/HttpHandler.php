<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer;

use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;

class HttpHandler
{
    public function handle(Request $request, array $procedures, string $delimiter = null): ResponseInterface
    {
        return dd($request, $procedures, $delimiter, 'хендле');
    }
}
