<?php

namespace Foundation\Providers;

use Foundation\Middleware\RequestId;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Ramsey\Uuid\Uuid;

/**
 * @method dispatchBrowserEvent(string $string, $message)
 * @method where($field, string $string, string $string1)
 */
class AppServiceProvider extends ServiceProvider
{
    const LOG_FORMAT = "[%datetime%](%level_name%) %message%\n";

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //  日志配置
        $logName = sprintf('%s-log', \App::runningInConsole() ? 'cli' : 'site');
        $this->app->configureMonologUsing(function (Logger $monolog) use ($logName) {
            $logLevel = Logger::toMonologLevel(config('app.log_level'));

            $handler = new RotatingFileHandler(
                storage_path('logs/' . $logName . '.log'),
                config('app.log_max_files', 0),
                $logLevel
            );

            $handler->setFormatter(new LineFormatter(self::LOG_FORMAT));
            $monolog->pushHandler($handler);
            $monolog->pushProcessor(function (array $record) {
                $requestId = request()->header(RequestId::HEADER_NAME);
                if (!$requestId) {
                    $requestId = Uuid::uuid4()->toString();
                    request()->headers->set(RequestId::HEADER_NAME, $requestId);
                }

                $requestId = str_replace('-', '', $requestId);
                $requestIdMsg = !empty($requestId) ? "rid: ".$requestId.' ' : '';
                $record['message'] =  $requestIdMsg . $record['message'];

                return $record;
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($message) {
            $this->dispatchBrowserEvent('notify', $message);
        });

        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });
    }
}
