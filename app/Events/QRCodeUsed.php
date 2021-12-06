<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QRCodeUsed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user;
    public $uuid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user,$uuid)
    {
        $this->user = $user;
        $this->uuid = $uuid;
    }

//    public function broadcastWith(){
//        return [
//            'data'=>'ok'
//        ];
//    }

    public function broadcastAs()
    {
        return 'QRCodeUsed';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('QRCodeUsed.'.$this->uuid);
    }
}
