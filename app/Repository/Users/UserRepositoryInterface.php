<?php

namespace App\Repository\Users;

/**
 * Class to handle all organization specific repository
 */
interface UserRepositoryInterface
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
     * @param Object $data values to create the org with
     *
     * @return Illuminate\Http\Response
     */
    public function create($data);
}
