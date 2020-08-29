<?php


namespace App\Repository\OrganizationUsers;

use App\Organization;
use App\OrganizationUser as OrganizationUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class OrganizationUserRepository implements OrganizationUserInterface
{
    /**
     * @var int|string|null
     */
    private $id;
    protected $model;

    public function __construct(OrganizationUserModel $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function create(Request $request)
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(Request $request)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function changeDisplayName(Request $request)
    {
        $organization_User = $this->model->whereId(auth()->id())
                            ->update(['displayName'=>$request->displayName]);
        return $organization_User ? true : false;
    }


    /**
     * @inheritDoc
     */
    public function resetUserPassword($newPassword)
    {
        $organization_User = $this->model->whereId(auth()->id())
            ->update(['password' => Hash::make(trim($newPassword))]);
        return $organization_User ? true : false;
    }

    public function index()
    {
        $organization_User = $this->model->whereId(auth()->id())->first();
        return $organization_User ? $organization_User : false;
    }

    /**
     * @inheritDoc
     */
    public function find(Request $request, $organizationId)
    {
        //using first() so that this does not return a collection
        //which cannot be used with OrganizationUserResource
        //collections should only be used when we are fetching more
        //than one row
        return $this->model->where('email', $request->email)
            ->where('organization_id', $organizationId)
            ->first();
    }

    /**
     *
     * @inheritDoc
     */
    public function firstLogin($data, $organizationId)
    {
        $organization = Organization::find($organizationId);

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            throw new \Exception("User with that email does not exist", 1);
        }

        //add the admin to the members of the workspace
        $createdMember = $organization->members()->attach(
            $user,
            [
                'displayName' => $data['name'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
            ]
        );

        /**
         * Make use of our login method to authenticate
         * admin
         *
         * attach() returns an exception if it can't attach
         * and returns null on success
         */
        if ( $createdMember === null ) {
            return $this->login($data, $organizationId);
        } else {
            Log::error("Error occured while creating a member", [
                'context' => [
                    'file' => __DIR__,
                    'action' => "Admin login"
                ],
            ]);

            throw new \Exception("Error while creating an organzation member");
        }
    }

    public function login(Request $request, $organizationId)
    {
        if (Auth::attempt(['organization_id'=>$organizationId,'email'=> $request->email,'password'=>$request->password])) {
            $OrganizationUser = $this->model->whereId(Auth::id())->first();
            $token = $OrganizationUser->createToken('my-app-token')->plainTextToken;
            Auth::login($OrganizationUser);
            return [$OrganizationUser, $token];
        } else {
            return false;
        }
    }
}
