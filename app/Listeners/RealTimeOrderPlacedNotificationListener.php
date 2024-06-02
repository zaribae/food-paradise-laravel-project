<?php

namespace App\Listeners;

use App\Events\RealTimeOrderPlacedNotificationEvent;
use App\Models\OrderPlacedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RealTimeOrderPlacedNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RealTimeOrderPlacedNotificationEvent $event): void
    {
        $notification = new OrderPlacedNotification();

        $notification->message = $event->message;
        $notification->order_id = $event->orderId;
        $notification->save();
    }
}
