<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Hello implements  ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct() ## User $user
    {
//        $this->user = $user;
    }

//     기본적으로는 퍼블릭 속성들을 json으로 리턴함.
    public function  broadcastWith(){
        return [
            'hello'=>'there',
//            'id' => $this->user->id
        ];
    }

    /**
     * Determine if this event should broadcast.
     *
     * @return bool
     */
//    public function broadcastWhen()
//    {
//        return $this->value > 100;
//    }


    /**
     * The name of the queue on which to place the event.
     *
     * @var string
     */
//    public $broadcastQueue = 'your-queue-name';
//    기본적으로 queue에 명시해둔 기본 대기 행렬에 연결됨.
// sync 큐를 사용한다면 ShouldBroadcastNow 인터페이스를 사용.

    /**
     * The event's broadcast name.
     *
     * @return string
     */
//    public function broadcastAs()
//    {
//        return 'server.created';
//      .listen('.server.created')
//    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('order.'.$this->update->order_id);
        return  new Channel('hello');
    }
}
