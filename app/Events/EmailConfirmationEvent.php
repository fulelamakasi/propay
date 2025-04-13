<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmailConfirmationEvent
{
    use Dispatchable, SerializesModels;

    public $user;
    public $newUser;
    /**
     * Create a new event instance.
     * @param object $user
     * @param object $newUser
     */
    public function __construct(object $user, object $newUser)
    {
        $this->user = $user;
        $this->newUser = $newUser;
    }

}
