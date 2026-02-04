<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
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

