<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('ga_categories', function (Blueprint $table) {
            $table->increments('id'); 
			$table->string('title')->nullable(); 
			$table->string('description')->nullable();  
			$table->tinyInteger('status')->default('0'); 
            $table->timestamps();
        });
        Schema::create('ga_analytics', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();; 
			$table->integer('category_id')->unsigned();; 
			$table->foreign('category_id')->references('id')->on('ga_categories')->onDelete('cascade'); 
			$table->string('website_name')->nullable(); 
			$table->string('tab_color')->nullable(); 
			$table->string('access_code')->nullable(); 
			$table->string('profile_id')->nullable(); 
			$table->string('token')->nullable(); 
			$table->string('ga_profile_id')->nullable(); 
			$table->tinyInteger('status')->default('0'); 
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
		Schema::dropIfExists('ga_categories');
        Schema::dropIfExists('g_analytics');
    }
}
