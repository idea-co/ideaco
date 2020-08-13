<?php

namespace App\Http\Controllers;

use App\Repository\Team\TeamRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\TeamResource;

class TeamController extends Controller
{
    /**
     * Create a new team within an organization
     * 
     * @param $request Form body
     * @param $organization Shortname of the parent organization
     * 
     * @return Response 
     */
    public function store(Request $request, $organizationId, TeamRepositoryInterface $model)
    {
        $request->validate(
            [
                'name' => 'required|unique:teams,name'
            ]
        );

        $team = $model->create($request, $organizationId);

        return new TeamResource($team);
    }
}
