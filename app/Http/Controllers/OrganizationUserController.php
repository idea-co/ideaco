<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationUserResource;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\OrganizationUsers\OrganizationUserInterface;
use Illuminate\Http\Response;

class OrganizationUserController extends Controller
{
    protected $model;

    public function __construct(OrganizationUserInterface $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return new OrganizationUserResource($this->model->index());
    }
    /**
     * @param Request $request
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function passwordReset(Request $request)
    {
        $request->validate(
            ['newPassword'=> 'required']
        );
        try{
            $response = $this->model->resetUserPassword(
                $request->newPassword
            );
            if($response === false){
                return response(['error'=> 'password can\'t be changed' ],403);
            }else{
                return response()->json(['message'=>'password updated successfully']);
            }
        }catch (Exception $exception){
            return response(['error'=> 'password can\'t be changed'],403);
        }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeDisplayName(Request $request){
        $request->validate(
            [
                'displayName'=> 'required'
            ]
        );
        try{
            $response = $this->model->changeDisplayName($request);
            if($response === false){
                return response()->json(['error'=> 'display name not changed' ],403);
            }else{
                return response()->json(['message'=>'name changed  successfully']);
            }
        }catch (Exception $exception){
            return response()->json(['error'=> 'display name can\'t be changed'],403);
        }
    }

    /**
     * @param Request $request
     * @param $organizationId
     * @return JsonResponse
     */
    public function login(Request $request, $organizationId)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $details = $this->model->login($request,$organizationId);
        if(false === $details){
             return response()->json(['error'=> 'unable to login'],403);
        }else{
            $data = $details[0];
            $token = $details[1];
            return response()->json(['data' => new OrganizationUserResource($data),
            'token' => $token]);
        }
    }

    public function logout()
    {
        try {
            $user = request()->user(); //or Auth::user()
            // Revoke current user token
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            return response()->json('logged out', 204);
        } catch (Exception $e) {
            return response()->json('error logging out', 500);
        }
    }

    /**
     * Find a member of an organization
     * @param Request $request form data
     *
     * @param $organizationId
     * @return OrganizationUserResource|string
     */
    public function find(Request $request, $organizationId)
    {
        $request->validate([
            'email' => 'required',
        ]);
        $member = $this->model->find($request,$organizationId);

        if (!$member) {
            return response()->json(['error_message' => "Specified user was not found in this organization"],404);
        } else {
            return new OrganizationUserResource($member);
        }
    }
}
