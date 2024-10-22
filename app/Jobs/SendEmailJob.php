<?php

namespace App\Jobs;

use Mail;
use App\Mail\NotificationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Illuminate\Support\Facades\Log;

use App\Models\EmailLog;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailData;
    public $tries = 3;

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function handle()
    {
        try {
            $email = new NotificationEmail($this->emailData);
            Mail::to($this->emailData['email'])->send($email);

            EmailLog::create([
                'recipient_email' => $this->emailData['email'],
                'subject' => $this->emailData['name'],
                'message' => $this->emailData['message'],
                'status' => 'success',
            ]);

            Log::info('Email sent successfully to: ' . $this->emailData['email']);
        } catch (Exception $e) {

            EmailLog::create([
                'recipient_email' => $this->emailData['email'],
                'subject' => $this->emailData['name'],
                'message' => $this->emailData['message'],
                'status' => 'failure',
                'error_message' => $e->getMessage(),
            ]);

            Log::error('Error sending email to: ' . $this->emailData['email']);
            $this->fail($e);
        }
    }

    public function failed(Exception $exception)
    {
        \Log::error('Email job failed: ' . $exception->getMessage());
    }

}
