<?php

namespace App\Repository\Team;
use Illuminate\Support\Str;
use App\Team;

class TeamRepository implements TeamRepositoryInterface {
    
    protected $team;

    /**
     * Typehint the Team model to the class
     * 
     * @param App\Team $team model
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }
    /**
     * Create a new team within an organization
     * 
     * @param Array $data form data
     * @param Int   $organizationId shortname of org
     * 
     * @return Resource
     */
    public function create($data, $organizationId)
    {
        $team = $this->team::create(
            [
                'name' => $data['name'],
                'shortname' => Str::slug($data['name']),
                'organization_id' => $organizationId
            ]
        );

        return $team;
    }
}