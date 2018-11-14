<?php

namespace App\Listeners;

use App\Events\OrderEdited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\OrderEditedNotificationClient;
use App\Mail\OrderEditedNotificationAdmin;

class SendOrderEditedEmail implements ShouldQueue
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
     * @param  OrderEdited  $event
     * @return void
     */
    public function handle(OrderEdited $event)
    {
         Mail::to($event->order->user->email)->send(new OrderEditedNotificationClient($event->order, $event->user));
         Mail::to('admin@prontolabs.io')->send(new OrderEditedNotificationAdmin($event->order, $event->user));
    }
}
