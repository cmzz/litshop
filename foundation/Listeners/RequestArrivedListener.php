<?php


namespace Foundation\Listeners;


use Foundation\Events\RequestArrivedEvent;
use Foundation\Middleware\RequestId;
use Ramsey\Uuid\Uuid;

class RequestArrivedListener
{
    public function handle(RequestArrivedEvent $event)
    {
        // 从 header 读取或生成 requestId
        $requestId =
            $event->request->headers->get(RequestId::HEADER_NAME) ?:
                $event->request->headers->get(RequestId::CF_HEADER_NAME) ?:
                    Uuid::uuid4()->toString();

        $event->request->headers->set(RequestId::HEADER_NAME, $requestId);
    }
}
