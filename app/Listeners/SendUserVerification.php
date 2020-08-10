<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserRegistered;
use App\Mail\SendUserVerification as MailSendUserVerification;
use App\Repository\Security\SecurityRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class SendUserVerification implements ShouldQueue
{
    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
    */
    public $queue = 'notifications';

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
     * @param  object  $event
     * @return void
     */
    public function handle(UserRegistered $event, SecurityRepositoryInterface $security)
    {
        Mail::to($event->email)->send(
            new MailSendUserVerification(
                $security->auth('verify_user', $event->email)
            )
        );
    }
}
