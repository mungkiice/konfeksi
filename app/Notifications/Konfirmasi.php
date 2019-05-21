<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Konfirmasi extends Notification
{
    use Queueable;
    public $image;
    public $url;
    public $pesanan
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pesanan)
    {
        $this->pesanan = $pesanan;
        $this->url = config('app.url') . '/konfeksi';
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
        ->subject('Konfirmasi Pembayaran')
        ->markdown('mail.bukti-bayar', ['pesanan' => $this->pesanan, 'url' => $this->url]);
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
