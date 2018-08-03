<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateSubscribePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_payments', function (Blueprint $table) {
            $table->increments('id');
			$table->string('slug')->nullable();
		 
            $table->integer('item_id')->nullable();
			$table->string('item_name')->nullable();
            $table->string('item_slug')->nullable();
			$table->integer('user_id')->nullable(); 
            $table->string('item_type')->nullable();
			
			$table->string('plan_type')->nullable();
			$table->dateTime('start_date'); 
			$table->dateTime('end_date'); 
			 
			$table->string('payment_gateway')->nullable();
			$table->string('transaction_id')->nullable();
			$table->string('paid_by')->nullable();
			$table->unsignedDecimal('amount', 8, 2); 
			$table->string('currency_code')->default('usd');
			$table->string('coupon_code_applied')->default('0');
			$table->integer('coupon_id')->nullable();
		 
			$table->string('actual_cost')->default('0');
			$table->string('discount_amount')->nullable();
			$table->string('after_discount')->nullable();
			$table->string('paid_amount')->nullable();
			$table->string('payment_status')->nullable();
			$table->longText('other_details')->nullable();
			
			$table->string('transaction_record')->nullable();
			$table->string('notes')->nullable();
			$table->string('recurring_subscription_response')->nullable();
			$table->string('description')->nullable();
			
			
			
			$table->tinyInteger('status')->default('1'); 
            $table->integer('created_by')->nullable();
            $table->timestamps();
			$table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
