<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSent extends Mailable
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
        return $this->markdown('mail.contact.sent');
    }
}
