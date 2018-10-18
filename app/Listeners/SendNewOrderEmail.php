<?php

namespace App\Listeners;

use App\Events\NewOrder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewOrderNotificationClient;
use App\Mail\NewOrderNotificationAdmin;

class SendNewOrderEmail implements ShouldQueue
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
     * @param  NewOrder  $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        Mail::to($event->order->user->email)->send(new NewOrderNotificationClient($event->order));
         Mail::to('admin@prontolabs.io')->send(new NewOrderNotificationAdmin($event->order));
    }
}
