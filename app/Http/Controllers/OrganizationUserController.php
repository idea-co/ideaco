<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationUserResource;
use App\OrganizationUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\OrganizationUsers\OrganizationUserInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        try{
            $response = $this->model->resetUserPassword(
                $request->newPassword
            );
            if($response == false){
                return response(['error'=> 'password can\'t be changed' ],403);
            }else{
                return response()->json(['message'=>'password updated successfully']);
            }
        }catch (\Exception $exception){
            return response(['error'=> 'password can\'t be changed'],403);
        }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeDisplayName(Request $request){
        try{
            $response = $this->model->changeDisplayName(
                $request->displayName
            );

            if($response === false){
                return response()->json(['error'=> 'display name not changed' ],403);
            }else{
                return response()->json(['message'=>'name changed  successfully']);
            }

        }catch (\Exception $exception){
            return response()->json(['error'=> 'display name can\'t be changed'],403);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request){
        if(Auth::attempt(['organization_id'=>$request->orgId,'user_id'=> $request->userId,'password'=>$request->password])){
            
            $OrganizationUser = OrganizationUser::whereId(Auth::id())->first();
            
            $token = $OrganizationUser->createToken('my-app-token')->plainTextToken;

            Auth::login($OrganizationUser);
            return response()->json(
                [
                    'OrganizationUser' => new OrganizationUserResource($OrganizationUser),
                    'token' => $token
                ]
            );
        }else{
            return response()->json(['error'=> 'unable to login'],403);
        }
    }

    public function logout()
    {
        try {
            $user = request()->user(); //or Auth::user()
            // Revoke current user token
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            return response()->json('logged out', 204);
        } catch (\Exception $e) {
            return response()->json('error logging out', 500);
        }
    }

    public function findByEmail(Request $request)
    {

    }
}
