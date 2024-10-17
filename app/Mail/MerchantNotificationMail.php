<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MerchantNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sessionDetails;

    public function __construct($sessionDetails)
    {
        $this->sessionDetails = $sessionDetails;
    }

    public function build()
    {
        return $this->view('emails.merchant_notification')
            ->with([
                'name' => $this->sessionDetails->customer_details->name,
                'address' => $this->sessionDetails->customer_details->address,
                'line_items' => $this->sessionDetails->line_items->data
            ]);
    }
}
