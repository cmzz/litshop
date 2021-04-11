<?php

namespace LitShop\Listeners\Foundation\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use LitShop\Events\Foundation\Events\RequestHandledEvent;

class RequestHandledListener
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
     * @param  RequestHandledEvent  $event
     * @return void
     */
    public function handle(RequestHandledEvent $event)
    {
        //
    }
}
