<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Log;

class UserEventSubscriber
{
    /*
     * ログインイベントの処理
     */
    public function handleUserLogin(Login $event): void
    {
        //ログインイベント時の処理をここに記述出来る
    }
    
    /*
     * ログアウトイベントの処理
     */
    public function handleUserLogout(Logout $event): void
    {
        Log::info('【認証】ユーザーがログアウトしました。 [ID: '. $event->user->id . ' ユーザ名:'. $event->user->name . ' Email:'. $event->user->email . ']');
    }
    /*
     * サブスクライバのリスナを登録
     */
    public function subscribe(Dispatcher $events): void
    {
        //イベントとリスナを引数に渡す。今回はさっき作ったLogSuccessfulLoginクラスを渡している
        $events->listen(
            Login::class,
            LogSuccessfulLogin::class
        );
        
        //イベントリスナのメソッドをサブスクライバクラス自身の中で定義されている場合は↓のようにかける
        $events->listen(
            Logout::class,
            [UserEventSubscriber::class, 'handleUserLogout']
        );        
    }
}
