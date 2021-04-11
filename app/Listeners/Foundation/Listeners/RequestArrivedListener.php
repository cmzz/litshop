<?php

namespace LitShop\Listeners\Foundation\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LitShop\Events\Foundation\Events\RequestArrivedEvent;

class RequestArrivedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RequestArrivedEvent  $event
     * @return void
     */
    public function handle(RequestArrivedEvent $event)
    {
        //
    }
}
