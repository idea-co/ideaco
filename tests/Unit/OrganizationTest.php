<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use App\Organization;

class OrganizationTest extends TestCase
{
    use RefreshDatabase;

    private $_table = 'organizations';
    /**
     * Test that an organization was successfully 
     * created
     *
     * @return void
     */
    public function testCreateOrganization()
    {
        $data = factory(Organization::class)->make();

        $org = \App\Organization::create($data);

        $this->assertDatabaseCount($this->_table, 1);	

        $this->assertDatabaseHas($this->_table, $org);
    }

    /**
     * Test that an organization was successfully
     * updated
     * 
     * @return void
     */
    public function testOrganizationUpdated()
    {
        //Create an organization
        $data = factory(Organization::class)->create();

        $updatedOrg = $data->update(['name' => 'Update name']);

        $this->assertDatabaseHas($this->_table, $updatedOrg);
    }
}
