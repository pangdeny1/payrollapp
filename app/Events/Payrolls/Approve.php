<?php

namespace App\Events\Payrolls;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Payroll;

class Approve
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $payroll;
    
    public function __construct(Payroll $payroll)
    {
        $this->payroll = $payroll;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
