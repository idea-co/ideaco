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
        Schema::create(
            'organization', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                //this will determine the ideaspace URL
                $table->string('shortname')->unique();
                $table->integer('owner_id');
                $table->string('active')->nullable();
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
            }
        );        

        /**
         * Pivot table to connect a user with an organization
         */
        Schema::create(
            'organization_user', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('organization_id');
                $table->string('displayName');
                $table->string('email');
                $table->string('password');
                $table->rememberToken();
                $table->string('phone')->nullable();
                $table->string('status')->nullable(); //deactivated/deleted
                $table->string('twitter')->nullable();
                //position held in the company
                $table->string('position')->nullable(); 
                $table->timestamps();

                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

                $table->foreign('organization_id')
                    ->references('id')
                    ->on('organization')
                    ->onDelete('cascade');

                $table->primary(['user_id', 'organization_id']);
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
        Schema::dropIfExists('organization');
        Schema::dropIfExists('organization_user');
    }
}
