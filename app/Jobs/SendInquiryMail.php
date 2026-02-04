<?php

namespace App\Jobs;

use App\Models\Inquiry;
use App\Mail\InquiryMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInquiryMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public Inquiry $inquiry;

    public function backoff(): array
    {
        return [10, 30, 60];
    }

    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function handle(): void
    {
        Mail::to($this->inquiry->email)
            ->send(new InquiryMail($this->inquiry));
    }
}

