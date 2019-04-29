<?php

namespace App\Notifications;

use App\Mail\BuktiPemesananMail;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class ProgresPesanan extends Notification
{
    use Queueable;
    public $statusPesanan;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($statusPesanan)
    {
        $this->statusPesanan = $statusPesanan;
        $pesanan = $statusPesanan->pesanan;
        if ($pesanan->statusPesanans()->count() == 4) {
            $pdf = PDF::loadView('mail.bukti-pemesanan', compact('pesanan'));
            Mail::to($pesanan->user)->send(new BuktiPemesananMail($pesanan, $pdf));
        }   
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from('info@sometimes-it-wont-work.com', config('app.name'))
        ->subject('Progres Pesanan #'. $this->statusPesanan->pesanan->kode_pesanan)
        ->markdown('mail.progres', ['statusPesanan' => $this->statusPesanan]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
