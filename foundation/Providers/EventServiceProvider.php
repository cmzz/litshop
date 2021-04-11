<?php

namespace Foundation\Providers;

use Foundation\Events\RequestArrivedEvent;
use Foundation\Events\RequestHandledEvent;
use Illuminate\Auth\Events\Registered;
use Foundation\Events\CP\AdminUserCreated;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Foundation\Listeners\RequestArrivedListener;
use Foundation\Listeners\RequestHandledListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // cp
        AdminUserCreated::class => [

        ],

        // common
        RequestArrivedEvent::class => [
            RequestArrivedListener::class,
        ],
        RequestHandledEvent::class => [
            RequestHandledListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
