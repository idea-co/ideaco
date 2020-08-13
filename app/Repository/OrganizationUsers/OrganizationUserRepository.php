<?php


namespace App\Repository\OrganizationUsers;

use App\OrganizationUser as OrganizationUserModel;
use Illuminate\Http\Request;

class OrganizationUserRepository implements \OrganizationUserInterface
{

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
    public function changeDisplayName(string $displayName, $id)
    {
        $change = OrganizationUserModel::whereId($id)->update(['displayName'=>$displayName]);
    }


    /**
     * @inheritDoc
     */
    public function resetUserPassword($id, $oldPassword, $newPassword)
    {
        $organization_User = OrganizationUserModel::whereId($id)
            ->wherePassword($oldPassword)->updaate(['password'=> $newPassword]);
        if ($organization_User) {
            return $organization_User;
        } else {
            return null;
        }
    }
}
