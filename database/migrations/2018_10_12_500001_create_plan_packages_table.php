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
			$table->string('slug')->unique();
            $table->integer('package_type')->nullable(); 
            $table->double('price_month')->nullable();
            $table->double('price_yearly')->nullable();
            $table->integer('have_trial')->nullable();
			$table->integer('trial_days')->nullable();
            $table->integer('users_allowed')->nullable();
			$table->integer('users_limit')->nullable(); 
            $table->integer('support_available')->nullable();
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
