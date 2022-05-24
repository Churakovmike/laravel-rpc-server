<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Parsers;

use ChurakovMike\LaravelRpcServer\Exceptions\ParseErrorException;

class RequestParser
{
    public function parseProcedureMethod(string $content = ''): string
    {
        try {
            $data = $this->decode($content);

            if (isset($data['method'])) {
                return $data['method'];
            }

        } catch (\JsonException $exception) {
            throw new ParseErrorException();
        }
    }

    private function decode(string $content): array
    {
        return json_decode(
            json: $content,
            associative: true,
            flags: JSON_THROW_ON_ERROR
        );
    }
}
