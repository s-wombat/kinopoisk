<?php

namespace App\Listeners;

use App\Events\SubscribeNews;
use App\Mail\NewFilm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailSubscribeNotification implements ShouldQueue
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
    public function handle(SubscribeNews $event): void
    {
        $eventFilm = $event->film->toArray();
        $user = $event->user;
//        dd($user);
        Mail::to($user)->send(new NewFilm($eventFilm));
//        Mail::to($user)->send(new SubscribeNews($eventFilm, $user));
    }
}
