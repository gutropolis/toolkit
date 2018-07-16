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
            $table->integer('plan_id');
            $table->integer('package_type');
            $table->double('price');
            $table->double('price_month');
            $table->double('price_yearly');
            $table->integer('have_trial');
            $table->integer('users_allowed');
            $table->integer('support_available');
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('plan_packages');
    }
}
