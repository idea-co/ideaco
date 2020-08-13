<?php

namespace App\Http\Controllers;

use App\Repository\Users\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Repository\Security\SecurityRepositoryInterface;

class UserController extends Controller
{
    /**
     * Create a new user or return the user instance
     * if the user already exists
     *
     * @param UserRepositoryInterface $model $request
     * @param Request $request
     * @return UserResource
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
    public function editDisplayName(UserRepositoryInterface $model, Request $request)
    {

    }

    /**
     * Verify a user email address by comparing OTP
     *
     * @param Request $request
     * @param SecurityRepositoryInterface $security
     * @return JsonResponse
     */
    public function verify(Request $request, SecurityRepositoryInterface $security)
    {
        $response = $security->verify($request->email, $request->otp);

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @param SecurityRepositoryInterface $security
     */
    public function passwordReset(Request $request, SecurityRepositoryInterface $security)
    {
        $id = Auth::id();
        $response = $security->resetUserPassword(
            $id,
            $request->newPassword,
            $request->oldPassword
        );
    }
}
