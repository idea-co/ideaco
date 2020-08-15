<?php
namespace App\Repository\OrganizationUsers;

use \Illuminate\Http\Request;
interface OrganizationUserInterface
{

    /**
     * @return mixed
     */
    public function index();
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
     * @return mixed
     */
    public function changeDisplayName(string $displayName);

    /**
     * @param $newPassword
     * @return mixed
     */
    public function resetUserPassword( $newPassword);

    /**
     * Find the member of an organization
     * 
     * @param Array form data (email, organization_id)
     */
    public function find($request);
}
