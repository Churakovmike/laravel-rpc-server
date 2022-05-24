<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RpcServerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //...
    }

    public function register(): void
    {
        Route::macro('rpc', fn(string $uri, array $procedures = []) => Route::any($uri, [HttpHandler::class, 'handle'])
            ->setDefaults([
                'procedures' => $procedures,
            ]));
    }
}
