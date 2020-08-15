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
     * @param Request $request
     * @param $organizationId
     * @return mixed
     */
    public function login(Request $request, $organizationId);

    /**
     * Find the member of an organization
     *
     * @param Request $request
     * @param $organizationId
     */
    public function find(Request $request, $organizationId);
}
