<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class pricePointUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $symbol;
    public $admin;

    public function __construct($high,$low,$open,$close,$timestamp,$admin)
    {
        $this->high = $high;
        $this->open = $open;
        $this->close = $close;
        $this->low = $low;
        $this->timestamp=$timestamp;
        $this->admin= $admin;
    }

    public function broadcastOn()
    {
        info("broadcasted");
        return new Channel($this->admin.'price-point-channel');
    }

    public function broadcastAs()
    {
        info("broadcasted");
        return 'price-point-updated';
    }
}
