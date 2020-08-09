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
        $response = $this->get('/start/#/new');

        //assert page was found
        $response->assertStatus(200);
    }
}
