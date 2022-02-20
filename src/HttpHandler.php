<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer;

use ChurakovMike\LaravelRpcServer\Exceptions\JsonRpcException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HttpHandler
{
    public function __construct(private readonly ErrorFactory $errorFactory) {}

    public function handle(Request $request, array $procedures, string $delimiter = null): JsonResponse
    {
        try {
            // $data = $this->resolver->resolve();
        } catch (JsonRpcException $exception) {
            return $this->buildResponse($this->errorFactory->make($exception));
        }

        return new JsonResponse([
            'jsonrpc' => '2.0',
            'result' => [],
            'error' => '',
            'id' => '',
        ]);
    }

    protected function buildResponse(array $data): JsonResponse
    {
        return new JsonResponse();
    }
}
