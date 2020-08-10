<?php

namespace App\Http\Controllers;

use App\Repository\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

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
}
