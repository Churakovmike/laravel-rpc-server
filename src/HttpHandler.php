<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer;

use ChurakovMike\LaravelRpcServer\Errors\Handler as ErrorHandler;
use ChurakovMike\LaravelRpcServer\Exceptions\JsonRpcException;
use ChurakovMike\LaravelRpcServer\Resolvers\MethodResolver;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HttpHandler
{
    public function __construct(
        private readonly MethodResolver $resolver,
        private readonly ErrorHandler $errorHandler,
    ) {}

    public function handle(Request $request)
    {
        try {
            $data = $this->resolver->resolve();
        } catch (JsonRpcException $exception) {
            return $this->buildResponse($this->errorHandler->render($request, $exception));
        }

        return $this->composeResponse();
    }

    protected function buildResponse(array $data): JsonResponse
    {
        return new JsonResponse();
    }

    protected function composeResponse()
    {
        return new JsonResponse([
            'jsonrpc' => '2.0',
            'result' => ['message' => 'мы тут'],
            'error' => '',
            'id' => '',
        ]);
    }
}
