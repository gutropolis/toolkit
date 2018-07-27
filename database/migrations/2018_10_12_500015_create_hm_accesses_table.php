<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHmAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hm_accesses', function (Blueprint $table) {
            $table->increments('id');
			$table->longText('domain')->nullable(); 
            $table->timestamps();
        });
		 Schema::create('hm_clicks', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('client')->nullable();
			$table->string('data')->nullable(); 
            $table->timestamps();
        });
		Schema::create('hm_client_pages', function (Blueprint $table) {
            $table->increments('id');
			$table->dateTime('data');  
			$table->dateTime('last_activity');
			$table->string('page')->nullable(); 
			$table->string('resolution')->nullable(); 
			$table->integer('clientid')->nullable(); 
            $table->timestamps();
        });
		
		Schema::create('hm_clients', function (Blueprint $table) {
            $table->increments('id');
			$table->string('domain')->nullable(); 
			$table->string('referrer')->nullable(); 
		    $table->tinyInteger('device_type')->nullable(); 
			$table->string('public_key')->nullable();  
            $table->timestamps();
        });
	    Schema::create('hm_client_tag', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('client')->nullable(); 
			$table->string('tag')->nullable();   
            $table->timestamps();
        });
		Schema::create('hm_limits', function (Blueprint $table) {
            $table->increments('id');
			$table->string('domain')->nullable(); 
			$table->integer('limits')->nullable();  
            $table->timestamps();
        });
		Schema::create('hm_movements', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('client')->nullable(); 
			$table->string('data')->nullable(); 
			 
            $table->timestamps();
        });
		
		Schema::create('hm_partials', function (Blueprint $table) {
            $table->increments('id');
			$table->string('record')->nullable(); 
			$table->integer('client')->nullable(); 
			 
            $table->timestamps();
        });
		
		Schema::create('hm_records', function (Blueprint $table) {
            $table->increments('id');
			$table->string('record')->nullable(); 
			$table->integer('client')->nullable(); 
			 
            $table->timestamps();
        });
		
		Schema::create('hm_user_client_watched', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('userid')->nullable(); 
			$table->integer('clientid')->nullable(); 
			 
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
        Schema::dropIfExists('hm_accesses');
		Schema::dropIfExists('hm_clicks');
		Schema::dropIfExists('hm_client_pages');
		Schema::dropIfExists('hm_clients');
		Schema::dropIfExists('hm_client_tag');
		Schema::dropIfExists('hm_limits');
		Schema::dropIfExists('hm_movements');
		Schema::dropIfExists('hm_partials');
		Schema::dropIfExists('hm_records');
		Schema::dropIfExists('hm_user_client_watched');
		
    }
}
