<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public $messageBody; // Message content

    /**
     * Create a new message instance.
     *
     * @param string $messageBody
     */
    public function __construct($messageBody)
    {
        $this->messageBody = $messageBody;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reply to Your Inquiry')
                    ->view('emails.contact-reply')
                    ->with('messageBody', $this->messageBody);
    }
}
