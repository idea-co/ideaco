<?php

namespace App\Repository\Users;

use App\Events\Users\UserRegistered;
use App\User;

/**
* This class implements the UserRepositoryInterface
* to manage all actions meant for interacting with the
*user model
 */
class UserRepository implements UserRepositoryInterface
{

    protected $user;

    /**
     * Type hint the App\user class
     * to the repository
     *
     * @param User $user the user model
     *
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Create a new user and return
     * the data
     *
     * @param $data Request body
     *
     * @return Illuminate\Support\Collection;
     */
    public function create($data)
    {
        $user = $this->user::firstOrCreate(['email' => $data['email']]);

        event(new UserRegistered($user));

        return $user;
    }

    /**
     * Retrieve a single user
     *
     * @param String $email the email address of the user
     *
     * @return void
     */
    public function find($email)
    {
        $org = $this->user::where('email', $email)->get();
        dd($org);
    }
}
