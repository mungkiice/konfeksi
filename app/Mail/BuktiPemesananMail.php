<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuktiPemesananMail extends Mailable
{
    use Queueable, SerializesModels;
    public $pesanan;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pesanan, $pdf)
    {
        $this->pesanan = $pesanan;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.invoice-body')->attachData($this->pdf->output(), 'Bukti-Pemesanan.pdf', ['mime' => 'application/pdf']);
    }
}
