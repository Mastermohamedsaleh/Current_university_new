<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Assignment;

class AssignmentCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $assignment;

    public function __construct(Assignment $assignment)
    {
        $this->assignment = $assignment;
    }


}
