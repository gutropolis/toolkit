<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {

            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
			
			//Extra Field //
			$table->string('lead_type');   //cold, warm and hot leads based on the probability of the lead converting into a future sale
			/*
    New
    Working – Contact Attempted
    Working – Contacted
    Qualified
    Closed – Not Contacted
    Closed – Not Qualified (or Not Interested)
    Closed – Spam
    Future Potential*/

			
            $table->string('lead_owner');
            $table->string('company');
            $table->string('title_or_position');
            $table->string('phone');
            $table->string('mobile');
            $table->string('fax');
            $table->string('email');
            $table->string('lead_status');
            $table->string('rating');
            $table->string('address');
            $table->string('Industry');
            $table->string('lead_source');
            $table->string('annual_revenue');
            $table->string('number_of_employees');
            $table->string('website');
            $table->string('system_col_id');
            $table->string('created_by')->nullable();
            $table->string('last_modified_by')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
