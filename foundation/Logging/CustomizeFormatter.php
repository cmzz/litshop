<?php


namespace Foundation\Logging;

use Foundation\Middleware\RequestId;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Ramsey\Uuid\Uuid;


class CustomizeFormatter
{
    const LOG_FORMAT = '[%datetime%] %channel%.%level_name%: %message% %context% %extra%';

    /**
     * Customize the given logger instance.
     *
     * @param \Illuminate\Log\Logger $logger
     * @return void
     */
    public function __invoke(\Illuminate\Log\Logger $logger)
    {
        $runMode = app()->runningInConsole() ? 'cli' : 'web';

        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new LineFormatter(
                "[%datetime%] {$runMode}.%channel%.%level_name%: %message% %context% %extra%\n"
            ));
        }

        $logger->pushProcessor(function (array $record) {
            $requestId = request()->header(RequestId::HEADER_NAME);
            if (!$requestId) {
                $requestId = Uuid::uuid4()->toString();
                request()->headers->set(RequestId::HEADER_NAME, $requestId);
            }

            $requestId = str_replace('-', '', $requestId);
            $requestIdMsg = !empty($requestId) ? ".".$requestId : '';
            $record['level_name'] =  $record['level_name'].$requestIdMsg;
            return $record;
        });
    }
}
