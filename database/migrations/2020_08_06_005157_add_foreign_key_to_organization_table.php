<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_idea', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('idea_id');
            $table->string('status'); //in progress, implemented, etc

            $table->foreign('organization_id')
                ->references('id')
                ->on('organization')
                ->onDelete('cascade');
                
            $table->foreign('idea_id')
                ->references('id')
                ->on('ideas')
                ->onDelete('cascade');

            $table->primary(['organization_id', 'idea_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_idea');
    }
}
