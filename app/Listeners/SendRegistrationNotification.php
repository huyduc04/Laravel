<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\NewUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegistrationNotification implements ShouldQueue
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
    public function handle(UserRegistered $event): void
    {
        Mail::to('huyndph33190@fpt.edu.vn')->send(new NewUserRegistered($event->user));
    }
}
