<?php

declare(strict_types=1);

namespace ChurakovMike\LaravelRpcServer\Enums;

enum RpcResponseCodes: int
{
    case PARSE_ERROR = -32700;
    case INVALID_REQUEST = -32600;
    case METHOD_NOT_FOUND = -32601;
    case INVALID_PARAMS = -32602;
    case INTERNAL_ERROR = -32603;
    case SERVER_ERROR = -32000;
}
