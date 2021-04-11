<?php


namespace Foundation\Events;


use Illuminate\Http\Request;

class RequestArrivedEvent
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
