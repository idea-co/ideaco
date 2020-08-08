<?php

namespace App\Repository\Organizations;

use App\Organization;

/**
 * This class implements the OrganizationRepositoryInterface
 * to manage all actions meant for interacting with the 
 * organization model
 */
class OrganizationRepository implements OrganizationRepositoryInterface
{

    protected $organization;

    /**
     * Type hint the App\Organization class
     * to the repository
     * 
     * @param App\Organization $organization the organization model
     * 
     * @return void
     */
    public function __construct(Organization $organization)
    {
        $this->organization = $organization;
    }

    /**
     * Create a new organization and return 
     * the data
     * 
     * @param $data Array of organization data
     * 
     * @return Illuminate\Support\Collection;
     */
    public function create($data)
    {
        //logic for creating a new org
    }

    /**
     * Retrieve a single organization
     * 
     * @param String $shortname the unique name of the org
     * 
     * @return Illuminate\Http\Response
     */
    public function find($shortname)
    {
        $org = $this->organization::where('shortname', $shortname);
        return $org;
    }

}