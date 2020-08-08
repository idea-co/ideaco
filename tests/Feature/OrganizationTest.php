<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    /**
     * Test to make sure that /get-started page doesn't break
     *
     * @return void
     */
    public function testGetStartedPage()
    {
        $response = $this->get('/get-started');

        //assert page was found
        $response->assertStatus(200);

        //assert see "Create Ideaspace
        $response->assertSee("Create an Ideaspace");
        $response->assertSee("Already there?");

        //assert see buttons
        $response->assertSee("Get Started");
        $response->assertSee("Join");




    }
}
