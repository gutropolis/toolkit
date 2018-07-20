<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentgatewayTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentgateway_types', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title')->null(); 
			$table->string('image_url')->null(); 
			$table->integer('order')->unsigned(); 
			$table->tinyInteger('status')->nullable(); 
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
        Schema::dropIfExists('paymentgateway_types');
    }
}
