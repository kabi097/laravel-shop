<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use App\Notifications\ProductsDelivered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProducts
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
     * @param  OrderCompleted  $event
     * @return void
     */
    public function handle(OrderCompleted $event)
    {
        auth()->user()->notify(new ProductsDelivered($event->order));
    }
}
