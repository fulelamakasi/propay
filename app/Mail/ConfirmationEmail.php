<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $newUser;

    /**
     * Create a new message instance.
     *
     * @param object $message
     */
    public function __construct(object $user, object $newUser)
    {
        $this->user = $user;
        $this->newUser = $newUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('User Creation/Modification Email')
                    ->view('emails.confirmation')
                    ->with(['user' => $this->user, 'newUser' => $this->newUser]);
    }
}