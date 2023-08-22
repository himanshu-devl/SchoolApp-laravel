<?php

namespace App\Listeners;

use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Jobs\NotifyChapterStatusChange;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ChapterStatusChanged; // You should replace this with the actual event class

class SendChapterStatus
{


    /**
     * Handle the event.
     *
     * @param  ChapterStatusChanged  $event
     * @return void
     */
    public function handle(ChapterStatusChanged $event)
    {

        $chapter = $event->chapter;
        $user = $event->user;

        NotifyChapterStatusChange::dispatch($chapter, $user);


    }
}
