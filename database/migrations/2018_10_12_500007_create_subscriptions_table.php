<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
			
			$table->integer('package_id')->unsigned(); 
			$table->foreign('package_id')->references('id')->on('plan_packages')->onDelete('cascade');
			$table->integer('user_id')->unsigned() ; 
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('organization_id')->unsigned(); 
			$table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
			
			$table->dateTime('from_date'); 
			$table->dateTime('end_date'); 
			$table->integer('interval')->unsigned(); 
			$table->tinyInteger('status')->nullable(); 
			$table->integer('transaction_mode')->unsigned(); 
			 
		 

            $table->string('name');

            $table->string('stripe_id');

            $table->string('stripe_plan');

            $table->integer('quantity');

            $table->timestamp('trial_ends_at')->nullable();

            $table->timestamp('ends_at')->nullable();
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
