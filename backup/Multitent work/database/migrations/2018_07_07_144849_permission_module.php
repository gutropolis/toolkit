<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermissionModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()

    {

       


        Schema::create('permission_module', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title');
			 $table->string('description');
			 $table->string('created_by');
			  

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
        //
    }
}
