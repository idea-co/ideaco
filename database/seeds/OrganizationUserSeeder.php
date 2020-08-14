<?php

use App\OrganizationUser;
use Illuminate\Database\Seeder;

class OrganizationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(  OrganizationUser::class,5)->create();
    }
}
