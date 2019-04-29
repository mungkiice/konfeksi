<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProgresMail extends Mailable
{
    use Queueable, SerializesModels;
    public $statusPesanan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($statusPesanan)
    {
        $this->statusPesanan = $statusPesanan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.progres');
    }
}
