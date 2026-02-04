<?php

namespace App\Mail;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Throwable;

class InquiryMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Inquiry $inquiry;

    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function build()
    {
        return $this
            ->subject('お問い合わせが届きました')
            ->view('emails.inquiry');
    }

    public function failed(Throwable $exception)
    {
        Log::error('メール送信失敗（Queue）', [
            'error' => $exception->getMessage(),
        ]);
    }

}

