<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptionhistory', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('subscription_id')->unsigned();
			$table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
			$table->integer('package_id')->unsigned(); 
			$table->foreign('package_id')->references('id')->on('plan_packages')->onDelete('cascade');
			
			$table->integer('transaction_mode')->unsigned(); 
			$table->integer('transaction_status')->unsigned(); 
			$table->string('transaction_ref')->null(); 
			
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
        Schema::dropIfExists('subscriptionhistory');
    }
}
