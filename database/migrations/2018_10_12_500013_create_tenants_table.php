<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sass_tenants', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->integer('role_id');
			$table->string('db_host');
			$table->string('db_username');
			$table->string('db_password');
			$table->string('db_port');
			$table->string('db_driver');
             $table->string('db_name');
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
        Schema::dropIfExists('tenants');
    }
}
