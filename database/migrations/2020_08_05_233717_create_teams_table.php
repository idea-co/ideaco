<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shortname');
            $table->string('photo_url');
            $table->string('organization_id');
            $table->string('user_id');
            $table->timestamps();
        });

        Schema::create('team_user', function(Blueprint $table) {
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->primary(['team_id', 'user_id']);
        });

        Schema::create('team_organization', function(Blueprint $table) {
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('organization_id');

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('organization_id')
                ->references('id')
                ->on('organization')
                ->onDelete('cascade');

            $table->primary(['team_id', 'organization_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_organization');
        Schema::dropIfExists('team_user');
        Schema::dropIfExists('teams');
    }
}
