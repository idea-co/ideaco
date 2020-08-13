<?php 

namespace App\Repository\Team;

interface TeamRepositoryInterface {
    /**
     * Create a new team
     * 
     * @param Array $data team information 
     */
    public function create($data, $organization);
}