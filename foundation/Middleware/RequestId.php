<?php

namespace Foundation\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class RequestId
{
    const CF_HEADER_NAME = 'X-FORWARD-REQUEST-ID';
    const HEADER_NAME = 'X-REQUEST-ID';

    public function handle(Request $request, Closure $next)
    {
        $requestId =
            $request->headers->get(self::HEADER_NAME) ?:
            $request->headers->get(self::CF_HEADER_NAME) ?:
            Uuid::uuid4()->toString();

        $request->headers->set(self::HEADER_NAME, $requestId);
        $response = $next($request);
        $response->headers->set(self::HEADER_NAME, $requestId);

        return $response;
    }
}
