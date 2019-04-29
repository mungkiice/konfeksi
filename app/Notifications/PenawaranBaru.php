<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PenawaranBaru extends Notification
{
    use Queueable;
    public $penawaran;
    public $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($penawaran)
    {
        $this->penawaran = $penawaran;
        $this->url = config('app.url') . '/penawaran';
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
        ->subject('Penawaran dari Konfeksi')
        ->markdown('mail.penawaran', ['penawaran' => $this->penawaran, 'url' => $this->url]);
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
