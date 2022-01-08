<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Mail\Mailer;
use App\Models\User;

class RegisteredListener
{
    private $mailer;
    private $eloquent;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer, User $user)
    {
        $this->mailer = $mailer;
        $this->eloquent = $user;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $this->eloquent->findOrFail($event->user->getAuthIdentifier());
        $this->mailer->raw('会員登録完了しました。', function($message) use ($user) {
            $message->subject('会員登録メール')->to($user->email);
        });
    }
}
