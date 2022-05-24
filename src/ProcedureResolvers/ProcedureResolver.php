<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\ProcedureResolvers;

use ChurakovMike\LaravelRpcServer\Parsers\RequestParser;

class ProcedureResolver
{
    public function __construct(
        private readonly RequestParser $parser,
    ) {
    }

    public function resolve(string $content = '', array $procedures = [])
    {
        $this->parser->parseProcedureMethod($content);
    }
}
