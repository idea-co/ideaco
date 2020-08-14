<?php

namespace App\Repository\Organizations;

use App\Organization;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Str;
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
        $shortname = Str::slug($data['name']);

        if ($this->organization::where('shortname', $shortname)->count() > 0) {
            return [
                'errors' => [ "shortname" => "The shortname has been taken" ]
            ];
        } else {
            //create the organization
            $org = $this->organization::create(
                [
                    'name' => $data['name'],
                    'shortname' => $shortname,
                    'owner_id' => $data['owner']['id']
                ]
            );

            return $org;
        }
    }

    /**
     * Do same as the interface
     */
    public function firstLogin($data, $organizationId)
    {
        $organization = $this->organization::find($organizationId);
        $user = User::where('email', $data['email'])->get();

        $loggedIn = $organization->members()->attach(
            $user[0],
            [
                'displayName' => $data['name'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
            ]
        );

        if($loggedIn){
            return true;
        }

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
        $org = $this->organization::where('shortname', $shortname)->get();
        dd($org);
    }


}
