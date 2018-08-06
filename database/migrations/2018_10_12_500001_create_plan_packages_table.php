<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_packages', function (Blueprint $table) {
            $table->increments('id'); 
			$table->integer('plan_id')->unsigned();
			$table->foreign('plan_id')->references('id')->on('plan')->onDelete('cascade'); 
			$table->string('title')->nullable();
			$table->string('slug')->unique();
            $table->string('description')->nullable(); 
			
			$table->enum('package_type',['day','week','month','year'])->nullable(); 
            $table->double('price')->nullable(); 
            $table->integer('have_trial')->nullable();
			$table->integer('trial_days')->nullable();
		    $table->integer('interval')->default('0');  
            $table->integer('users_allowed')->nullable();
			$table->integer('users_limit')->nullable(); 
            $table->integer('support_available')->nullable();
			$table->tinyInteger('status')->default('1'); 
			 
			$table->string('razor_package_id')->nullable();
			$table->string('stripe_package_id')->nullable();
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
        Schema::dropIfExists('plan_packages');
    }
}
