<?php

namespace App\Events;

use App\Models\User;
use App\Models\Chapter;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChapterStatusChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $chapter;
    public $user;
    public $status;

    /**
     * Create a new event instance.
     */
    public function __construct(Chapter $chapter, User $user)
    {
        $this->chapter = $chapter;
        $this->user = $user;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
