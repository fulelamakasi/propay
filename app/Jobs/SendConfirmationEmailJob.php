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

    protected $message;
    protected $toEmail;

    /**
     * Create a new job instance.
     *
     * @param string $message
     * @param string $toEmail
     */
    public function __construct(string $message, string $toEmail)
    {
        $this->message = $message;
        $this->toEmail = $toEmail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->toEmail)
            ->send(new ConfirmationEmail($this->message));
    }
}