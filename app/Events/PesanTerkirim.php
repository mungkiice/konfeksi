<?php

namespace App\Events;

use App\Pesan;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PesanTerkirim
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * User that sent the pesan
     *
     * @var User
     */
    public $user;

    /**
     * pesan details
     *
     * @var pesan
     */
    public $pesan;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Pesan $pesan)
    {
        $this->user = $user;
        $this->pesan = $pesan;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
}
