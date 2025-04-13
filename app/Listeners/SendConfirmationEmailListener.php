<?php

namespace App\Listeners;

use App\Events\EmailConfirmationEvent;
use App\Jobs\SendConfirmationEmailJob;

class SendConfirmationEmailListener
{
    /**
     * Handle the event.
     *
     * @param  EmailConfirmationEvent  $event
     * @return void
     */
    public function handle(EmailConfirmationEvent $event)
    {
        SendConfirmationEmailJob::dispatch($event->user, $event->newUser);
    }
}