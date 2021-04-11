<?php


namespace Foundation\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogAsyncJob implements ShouldQueue
{
    use Queueable;
    private string $message;
    private ?array $context;
    private array $_server;

    public function __construct(string $message, array $context = null, array $server = [])
    {
        $this->message = $message;
        $this->context = $context;

        // todo $_SERVER重的内容可以按需记录到日志
        $this->_server = $server;
    }

    public function handle()
    {
        Log::debug($this->message, $this->context);
    }
}
