<?php

namespace App\Http\Controllers;

use App\Repository\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Repository\Security\SecurityRepositoryInterface;

class UserController extends Controller
{
    /**
     * Create a new user or return the user instance
     * if the user already exists
     * 
     * @param $model $request
     */
    public function store(UserRepositoryInterface $model, Request $request)
    {   
        $request = $request->validate(
            [
                'email' => 'required'
            ]
        );
        
        $user = $model->create($request);

        return new UserResource($user);
    }

    /**
     * Verify a user email address by comparing OTP
     * 
     * @return Array
     */
    public function verify(Request $request, SecurityRepositoryInterface $security)
    {
        $response = $security->verify($request->email, $request->otp);

        return response()->json($response);
    }
}
