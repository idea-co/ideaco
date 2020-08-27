<?php

namespace App\Repository\Security;

use App\OTP;
use Carbon\Carbon;

/**
 * This class implements the UserRepositoryInterface
 * to manage all actions meant for interacting with the
 * user model
 */
class SecurityRepository implements SecurityRepositoryInterface
{

    protected $otp;

    /**
     * Type hint the App\user class
     * to the repository
     *
     * @param App\OTP $otp the otp model
     *
     * @return void
     */
    public function __construct(OTP $otp)
    {
        $this->otp = $otp;
    }

    /**
     * Create a new otp and return
     * the data
     *
     * @param $purpose Purpose of otp
     *
     * @param $email
     * @return Illuminate\Support\Collection;
     */
    public function auth($purpose, $email)
    {
        $otp = $this->otp::create(
            [
                'purpose' => $purpose,
                'otp' => mt_rand(1111, 9999),
                'email' => $email
            ]
        );

        return $otp;
    }

    /**
     * Verify an OTP
     *
     * @param String $email the email address of the user
     * @param $token
     * @return array|bool[]
     */
    public function verify($email, $token)
    {
        $otp = $this->otp::where('email', $email)
                    ->where('otp', $token)
                    ->where('active', '1')
                    ->get();
        /**
         * We should only have one active otp for the user
         * since we deactivate all other otps immediately they
         * are used
         */
        if ($otp->count() == 1) {
            //OTP is correct, check for validity
            $sent_at = Carbon::parse($otp[0]->created_at);
            $now = Carbon::now();

            $timePassed = $now->diffInDays($sent_at);

            if ($timePassed > 0) {
                return [
                    'verified' => false,
                    'reason' => 'Code has expired. OTP is only valid for one day'
                ];
            } else {
                //otp has successfully been verified, deactivate it
                $this->_deactivate($otp[0]);

                return [
                    'verified' => true,
                ];
            }
        } else {
            return [
                'verified' => false,
                'reason' => 'OTP value is incorrect',
            ];
        }
    }

    /**
     * Simple method to deactive an OTP token
     *
     * @param $otp Instance of App\Otp
     */
    private function _deactivate($otp)
    {
        //deactivate otp
        $otp->active = '0';
        $otp->save();

        return true;
    }
}
