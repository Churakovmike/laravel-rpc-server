<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer;

use ChurakovMike\LaravelRpcServer\Errors\Handler as ErrorHandler;
use ChurakovMike\LaravelRpcServer\Exceptions\JsonRpcException;
use ChurakovMike\LaravelRpcServer\ProcedureExecutors\ProcedureExecutor;
use ChurakovMike\LaravelRpcServer\ProcedureResolvers\ProcedureResolver;
use ChurakovMike\LaravelRpcServer\Requests\JsonRpcRequest;
use Illuminate\Http\JsonResponse;

class HttpHandler
{
    public function __construct(
        private readonly ProcedureResolver $resolver,
        private readonly ErrorHandler $errorHandler,
        private readonly ProcedureExecutor $procedureExecutor,
    ) {}

    public function handle(JsonRpcRequest $request, $procedures)
    {
        try {
            throw new JsonRpcException('qwe');

            $response = $this->resolver->resolve($request->getContent(), $procedures);
            $response = $this->procedureExecutor->execute(self::class);
        } catch (JsonRpcException $exception) {
            return $this->errorHandler->render($request, $exception);
        }

        return $this->composeResponse();
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
