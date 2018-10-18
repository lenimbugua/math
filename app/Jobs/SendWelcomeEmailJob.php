<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\NewUserWelcome;
use App\Mail\NewUserNotification;
use App\Events\NewUser;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $event;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(NewUser $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->event->user->email)->send(new NewUSerWelcome($this->event->user));
         Mail::to('admin@prontolabs.io')->send(new NewUSerNotification($this->event->user));
    }
}
