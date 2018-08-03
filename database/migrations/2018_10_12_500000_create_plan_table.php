<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->increments('id');
		    $table->string('title')->nullable();
			$table->string('slug')->unique();
            $table->string('description')->nullable(); 
			$table->tinyInteger('is_stripe_plan')->default('0'); 
			$table->string('stripe_plan_id')->nullable(); 
			$table->tinyInteger('is_razor_plan')->default('0'); 
			$table->string('razor_plan_id')->nullable(); 
			
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
        Schema::dropIfExists('plan');
    }
}
