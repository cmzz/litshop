<?php


namespace Foundation\Events;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestHandledEvent
{
    public Request $request;
    public Response|JsonResponse $response;

    public function __construct(Request $request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
