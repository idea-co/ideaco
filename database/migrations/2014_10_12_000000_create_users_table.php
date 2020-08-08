<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * All users will be attached to an organization
         * so we will not use this table, and insteadc
         * create an {organization_users} table where
         * users will be stored alongisde the org they belong
         * -------------------------------------------------
         * Alternatively we add a org_id in this table and 
         * connect the dots
         */
        Schema::create(
            'users', function (Blueprint $table) {
                $table->id();
                $table->string('photo_url')->nullable();
                $table->string('email')->unique();
                //if the user has activated their account
                $table->timestamp('email_verified_at')->nullable(); 
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
