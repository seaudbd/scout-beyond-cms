<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $mailFrom;
    public $subject;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $mailFrom, $subject, $message)
    {
        $this->name = $name;
        $this->mailFrom = $mailFrom;
        $this->subject = $subject;
        $this->message = $message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('Emails.contact_admin')->with(['data' => $this->message, 'name' => $this->name, 'mailFrom' => $this->mailFrom]);
    }
}
