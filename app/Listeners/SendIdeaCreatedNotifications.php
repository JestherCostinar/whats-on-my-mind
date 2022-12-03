<?php

namespace App\Listeners;

use App\Events\IdeaCreated;
use App\Models\User;
use App\Notifications\NewIdea;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendIdeaCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\IdeaCreated  $event
     * @return void
     */
    public function handle(IdeaCreated $event)
    {
        foreach(User::whereNot('id', $event->idea->user_id)->cursor() as $user) {
            $user->notify(new NewIdea($event->idea));
        }
    }
}
