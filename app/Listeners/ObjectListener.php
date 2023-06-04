<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;

class ObjectListener
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
    public function handle(object $event): void
    {
        User::role('vigia')
            ->each(function(User $user) use ($event){ 
                Notification::send($user, new ObjectNotification($event->nuevo_objeto));
            });
    }
}
