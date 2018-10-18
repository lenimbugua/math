<?php

namespace App\Listeners;

use App\Jobs\SendWelcomeEmailJob;
use App\Events\NewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendWelcomeEmail implements ShouldQueue
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
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {

        SendWelcomeEmailJob::dispatch($event)
             ->delay(now()->addSeconds(5));
        
    }
}
