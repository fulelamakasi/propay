<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmailConfirmationEvent
{
    use Dispatchable, SerializesModels;

    public $message;
    public $toEmail;
    /**
     * Create a new event instance.
     * @param string $message
     * @param string $toEmail
     */
    public function __construct(string $message, string $toEmail)
    {
        $this->message = $message;
        $this->toEmail = $toEmail;
    }

}
