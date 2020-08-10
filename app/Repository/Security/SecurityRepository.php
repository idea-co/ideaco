<?php

namespace App\Repository\Security;

use App\OTP;

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
     * @param String $otp the token received from the user
     * 
     * @return Illuminate\Http\Response
     */
    public function verify($email, $otp)
    {
        $org = $this->user::where('email', $email)->get();
    }

}