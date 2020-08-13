<?php 

namespace App\Repository\Organizations;

/**
 * Class to handle all organization specific repository
 */
interface OrganizationRepositoryInterface
{
    /**
     * List all organizations
     * 
     * @param String $shortname unique name used to create a url for the workspace
     * 
     * @return Illuminate\Http\Response
     */
    public function find($shortname);

    /**
     * Create a new organization
     * 
     * @param Array $data values to create the org with
     * 
     * @return Illuminate\Http\Response
     */
    public function create($data);

    /**
     * Log in the admin for the first time
     * 
     * @param Array $data values from the form
     * @param Int $organizationId ord id
     * @return Response
     */
    public function firstLogin($data, $organizationId);
}