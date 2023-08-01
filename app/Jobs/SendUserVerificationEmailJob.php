<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserVerificationEmail;
use Throwable;
use Illuminate\Support\Facades\Log;

class SendUserVerificationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
    
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Send the email
        Mail::to($this->user->email)->send(new NewUserVerificationEmail($this->user));
    }

    public function failed(Throwable $exception)
    {
        Log::error('Job failed: ' . $exception->getMessage());
        $this->release(10); // Delay the job for 10 seconds before retrying
    }
}
