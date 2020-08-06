<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shortname');
            $table->string('email');
            $table->string('owner_id');
            $table->string('active');
            $table->text('photo_url')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('current_billing_plan')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->string('card_country')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip', 25)->nullable();
            $table->string('billing_country', 2)->nullable();
            $table->string('vat_id', 50)->nullable();
            $table->text('extra_billing_information')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamps();
        });

        Schema::create('organization_idea', function (Blueprint $table) {
            $table->string('organization_id');
            $table->string('idea_id');
            $table->string('status'); //in progress, implemented, etc

            $table->foreign('organization_id')
                ->references('id')
                ->on('organization')
                ->onDelete('cascade');
                
            $table->foreign('idea_id')
                ->references('id')
                ->on('ideas')
                ->onDelete('cascade');

            $table->primary(['idea_id', 'organization_id'])
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
        Schema::dropIfExists('organization');
    }
}
