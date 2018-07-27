<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribeusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_users', function (Blueprint $table) {
             $table->increments('id');
			 $table->integer('item_id')->nullable();
			 $table->integer('user_id')->nullable();
			 $table->integer('organization_id')->nullable();
			 $table->dateTime('start_date'); 
			 $table->dateTime('end_date'); 
			 
			 
			 $table->string('subscription_reference')->nullable();
             $table->timestamp('trial_ends_at')->nullable();
			
			 $table->timestamp('ends_at')->nullable();
             $table->timestamp('next_billing_at')->nullable();
             
			 $table->integer('interval')->unsigned(); 
		     $table->longText('billing_address')->nullable();
             $table->longText('shipping_address')->nullable();
			 
			 
			 
			 $table->tinyInteger('status')->default('0'); 
			 $table->integer('invoice_id')->nullable(); 
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
        Schema::dropIfExists('subscribeusers');
    }
}
