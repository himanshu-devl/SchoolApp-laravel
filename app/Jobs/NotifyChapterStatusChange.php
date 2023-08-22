<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Chapter;
use Illuminate\Bus\Queueable;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyChapterStatusChange implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $chapter;
    public $user;

    public function __construct(Chapter $chapter,  User $user)
    {
        $this->chapter = $chapter;

        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $user = $this->user;
        $chapter = $this->chapter; 

        if ($user && $chapter) {
            Mail::to($user->email)->send(new NotificationEmail($chapter));
        }
    }
}
