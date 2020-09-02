<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $contactInfo;
    public $ticketId;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, $ticketId)
    {
        $this->contactInfo = $request;
        $this->ticketId = $ticketId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.contact.received');
    }
}
