<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HttpHandler
{
    public function handle(Request $request, array $procedures, string $delimiter = null): JsonResponse
    {
        return new JsonResponse([
            'jsonrpc' => '2.0',
            'result' => [],
            'error' => '',
            'id' => '',
        ]);
    }
}
