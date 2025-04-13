<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;

class SendConfirmationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $newUser;

    /**
     * Create a new job instance.
     *
     * @param object $user
     * @param object $newUser
     */
    public function __construct(object $user, object $newUser)
    {
        $this->user = $user;
        $this->newUser = $newUser;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->newUser->email)
            ->send(new ConfirmationEmail($this->newUser, $this->user));
    }
}