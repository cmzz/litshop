<?php


namespace Foundation\Listeners;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Foundation\Events\RequestHandledEvent;

class RequestHandledListener
{
    public function handle(RequestHandledEvent $event)
    {
        $start = $event->request->server('REQUEST_TIME_FLOAT');
        $end = microtime(true);

        $params = $event->request->all();
        if ($files = $event->request->allFiles()) {
            foreach ($files as $key => $uploadedFile) {
                $params[$key] = [
                    'originalName' => $uploadedFile->getClientOriginalName(),
                    'mimeType' => $uploadedFile->getClientMimeType(),
                ];
            }
        }

        $context = [
            'params'        => $params,
            'response'      => $event->response instanceof SymfonyResponse ? json_decode($event->response->getContent(), true) : (string) $event->response,
            'url'           => $event->request->server('REQUEST_URI'),
            'ip'            => $event->request->server('REMOTE_ADDR'),
            'http_method'   => $event->request->server('REQUEST_METHOD'),
            'server'        => $event->request->server('SERVER_NAME'),
            'referrer'      => $event->request->server('HTTP_REFERER'),
            'start'         => $start,
            'end'           => $end,
            'duration'      => formatDuration($end - $start),
        ];

        $message = 'log by system automated: request processed';
        logAsync($message, $context);
    }
}
