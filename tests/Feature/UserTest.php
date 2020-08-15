<?php

namespace Tests\Feature;

use App\OrganizationUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use phpseclib\Crypt\Random;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testOrganizationUserLogin()
    {        $user = OrganizationUser::inRandomOrder()->first(); // pick a user from the database
        $response = $this->json('post',
            'api/organizations/members/login',
            ['orgId' => $user->organization_id,
                'userId' => $user->user_id,
                'password' => 'password'
                ]
        ); // send a post request to th api with the required data;
        $response->dump(); //dump response
        $data = $response; //dump response
        $token = $data['token'];
        $response->assertStatus(200);
        $response->assertJson(['OrganizationUser'=> ['id'=>$user->id]]); //check if the json returned has the user id
        $this->json('post','api/organizations/members/logout',[],['Authorization' => 'Bearer ' . $token]);

    }
    public function testChangeUserDisplayName()
    {
        $DummyUser = factory(OrganizationUser::class)->make();
        $user = OrganizationUser::inRandomOrder()->first(); // pick a user from the database
        $response = $this->json('post',
            'api/organizations/members/login',
            ['orgId' => $user->organization_id,
                'userId' => $user->user_id,
                'password' => 'password'
            ]
        ); // send a post request to th api with the required data
        $response->assertStatus(200);
        $data = $response; //dump response
        $token = $data['token'];
        dump($token);
        dump($data['OrganizationUser']['displayName']);
        $response->assertStatus(200); // check if successful
        $response->assertJson(['OrganizationUser'=> ['id'=>$user->id]]); //check if the json returned has the user id
        $response2 = $this->json(
                'patch',
                'api/organizations/members/display-name',
                ['displayName'=> $DummyUser->displayName],
                ['Authorization' => 'Bearer ' . $token]
            );
        $response2->dump(); /// dump response
        $response2->assertStatus(200);
        $response3 = $this->json(
            'get',
            'api/organizations/members',
            [],
            ['Authorization' => 'Bearer ' . $token]
        ); // get user details
         $name = $response3['OrganizationUser']['displayName'];//display new name
        dump('new name');
        dump($name);
        $this->assertNotEquals($response['OrganizationUser']['displayName'],$response3['OrganizationUser']['displayName']);
        //verify name change

        //logout
        $response2 = $this->json('post','api/organizations/members/logout',[],['Authorization' => 'Bearer ' . $token]); //not working on unit test but works in postMan
    }
}
