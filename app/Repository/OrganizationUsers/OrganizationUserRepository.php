<?php


namespace App\Repository\OrganizationUsers;

use App\OrganizationUser as OrganizationUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrganizationUserRepository implements OrganizationUserInterface
{
    /**
     * @var int|string|null
     */
    private $id;
    protected $model;

    public function __construct(OrganizationUserModel $model)
    {
        if(Auth::check()){
            $this->id = Auth::id();
        }

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
    public function changeDisplayName(string $displayName)
    {
        $organization_User = OrganizationUserModel::whereId($this->id)->update(['displayName'=>$displayName]);
        return $organization_User ? true : false;
    }


    /**
     * @inheritDoc
     */
    public function resetUserPassword($newPassword)
    {
        $organization_User = OrganizationUserModel::whereId($this->id)
            ->update(['password' => Hash::make(trim($newPassword))]);
        return $organization_User ? true : false;
    }

    public function index()
    {
        $organization_User = OrganizationUserModel::whereId($this->id)->first();
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


    public function login(Request $request, $organizationId)
    {
        if(Auth::attempt(['organization_id'=>$organizationId,'email'=> $request->email,'password'=>$request->password])) {
            $OrganizationUser = OrganizationUserModel::whereId(Auth::id())->first();
            $token = $OrganizationUser->createToken('my-app-token')->plainTextToken;
            Auth::login($OrganizationUser);
            return [$OrganizationUser, $token];
        }else{
            return false;
        }
    }
}
