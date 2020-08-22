<?php

namespace App\Repository\Organizations;

/**
 * Class to handle all organization specific repository
 */
interface OrganizationRepositoryInterface
{
    /**
     * Find an organization by it's unique ame
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
}
