<?php

namespace Foundation\Middleware;

use Closure;
use Foundation\Events\RequestArrivedEvent;
use Foundation\Events\RequestHandledEvent;
use Illuminate\Http\Request;

class RequestId
{
    const CF_HEADER_NAME = 'X-FORWARD-REQUEST-ID';
    const HEADER_NAME = 'X-REQUEST-ID';

    public function handle(Request $request, Closure $next)
    {
        event(new RequestArrivedEvent($request));
        return $next($request);
    }

    public function terminate(Request $request, $response)
    {
        event(new RequestHandledEvent($request, $response));
    }
}
