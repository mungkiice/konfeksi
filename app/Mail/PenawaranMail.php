<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PenawaranMail extends Mailable
{
    use Queueable, SerializesModels;
    public $penawaran;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($penawaran)
    {
        $this->penawaran = $penawaran;
        $this->url = '/';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.penawaran');
    }
}
