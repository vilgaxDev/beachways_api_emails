<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendBulkEmail implements ShouldQueue
{
    use Queueable;

    protected $recipients;
    protected $subject;
    protected $content;

    /**
     * Create a new job instance.
     */
    public function __construct(array $recipients, string $subject, string $content)
    {
        $this->recipients = $recipients;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->recipients as $recipient) {
            \Illuminate\Support\Facades\Mail::to($recipient)->send(new \App\Mail\GeneralAnnouncementMail($this->subject, $this->content));
        }
    }
}
