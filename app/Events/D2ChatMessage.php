<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class D2ChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $msgInfo;

    public string $channelKey;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($msgInfo,$channelKey)
    {
        $this->msgInfo = $msgInfo;
        $this->channelKey = $channelKey;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel($this->channelKey);
    }

    /**
     * 別名
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'd2trade-send';
    }
}
