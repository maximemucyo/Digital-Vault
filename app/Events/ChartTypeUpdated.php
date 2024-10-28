<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChartTypeUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $chartType;
    public $admin;

    public function __construct($chartType,$admin)
    {
        $this->symbol = $chartType;
        $this->admin= $admin;
    }

    public function broadcastOn()
    {
        return new Channel($this->admin.'chart-type-channel');
    }

    public function broadcastAs()
    {
        return 'chart-type-updated';
    }
}
