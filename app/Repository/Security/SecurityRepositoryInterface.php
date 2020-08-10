<?php 

namespace App\Repository\Security;

/**
 * Class to handle all OTPs
 */
interface SecurityRepositoryInterface
{
    /**
     * List all organizations
     * 
     * @param String $type purpose of OTP
     * 
     * @return Illuminate\Http\Response
     */
    public function auth($type, $user);

    /**
     * Verify OTP
     * 
     * @param $email, $otp
     * 
     * @return Boolean
     */
    public function verify($email, $otp);
}