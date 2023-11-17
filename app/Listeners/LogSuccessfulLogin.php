<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogin
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
    public function handle(Login $event): void
    {
        Log::info('【認証】ユーザーがログインしました。 [ID: '. $event->user->id . ' ユーザ名:'. $event->user->name . ' Email:'. $event->user->email . ']');
    }
}
