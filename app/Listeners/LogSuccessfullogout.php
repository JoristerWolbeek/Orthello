<?php

namespace App\Listeners;

use Illuminate\Auth\Events\logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfullogout
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
     * @param  logout $event
     * @return void
     */
    public function handle(logout $event)
    {
        $event->user->last_logout = now();
        $event->user->save();
    }
}
