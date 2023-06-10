<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $attachmentPaths;

    /**
     * Create a new message instance.
     *
     * @param array $details
     * @param array $attachmentPaths
     * @return void
     */
    public function __construct($details, $attachmentPaths)
    {
        $this->details = $details;
        $this->attachmentPaths = $attachmentPaths;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->subject($this->details['subject'])
            ->view('mails.mail_content')
            ->with('details', $this->details);

        if (!empty($this->attachmentPaths)) {
            foreach ($this->attachmentPaths as $attachmentPath) {
                $message->attach($attachmentPath);
            }
        }

        return $message;
    }
}