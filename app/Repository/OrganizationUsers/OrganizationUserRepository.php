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

    public function __construct()
    {
        $this->id = Auth::id();
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
}
