<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Users\UserRegistered;
use App\Mail\SendUserVerification as MailSendUserVerification;
use App\Repository\Security\SecurityRepository;
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
     * Store the Security object
     * @var SecurityRepositoryInterface
     */
    private $_otp;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SecurityRepository $security)
    {
        $this->_otp = $security;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Mail::to($event->user->email)->send(
            new MailSendUserVerification(
                $this->_otp->auth('verify_user', $event->user->email)
            )
        );
    }
}
