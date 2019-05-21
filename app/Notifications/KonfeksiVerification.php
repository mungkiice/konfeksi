<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class KonfeksiVerification extends Notification
{
    use Queueable;
    public $konfeksi;
    public $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($konfeksi)
    {
        $this->konfeksi = $konfeksi;
        $this->url = config('app.url') .'/konfeksi';
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
        ->subject('Verifikasi Akun Konfeksi')
        ->markdown('mail.verifikasi-konfeksi', ['url' => $this->url, 'konfeksi' => $this->konfeksi]);
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
