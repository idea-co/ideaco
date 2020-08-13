<?php
use \Illuminate\Http\Request;
interface OrganizationUserInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request);

    /**
     * @param string $displayName
     * @param $id
     * @return mixed
     */
    public function changeDisplayName(string $displayName, $id);

    /**
     * @param $id
     * @param $oldPassword
     * @param $newPassword
     * @return mixed
     */
    public function resetUserPassword($id, $oldPassword, $newPassword);
}
