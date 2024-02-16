<?php

namespace App\Listeners;
use \App\Events\UpdatePostsCount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class incrementUserPostsCount
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdatePostsCount $event): void
    {
        $user = $event->post->user;
        $user->posts_count++;
        $user->save();
    }
};
