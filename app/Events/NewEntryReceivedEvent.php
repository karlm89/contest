<?php

namespace App\Events;

use App\Models\ContestEntry;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewEntryReceivedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contestEntry;

    /**
     * Create a new event instance.
     *
     * @param ContestEntry $contestEntry
     */
    public function __construct(ContestEntry $contestEntry)
    {
        $this->contestEntry = $contestEntry;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
