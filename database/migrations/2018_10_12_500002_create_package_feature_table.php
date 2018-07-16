<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_feature', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
            $table->string('description');  
		    $table->integer('order_by'); 
		    $table->integer('package_id')->unsigned();
			$table->foreign('package_id')->references('id')->on('plan_packages')->onDelete('cascade');
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
        Schema::dropIfExists('package_feature');
    }
}
