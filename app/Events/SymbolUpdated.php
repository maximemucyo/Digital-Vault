<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SymbolUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $symbol;
    public $admin;

    public function __construct($symbol,$admin)
    {
        $this->symbol = $symbol;
        $this->admin= $admin;
    }

    public function broadcastOn()
    {
        return new Channel($this->admin.'symbol-channel');
    }

    public function broadcastAs()
    {
        return 'symbol-updated';
    }
}
