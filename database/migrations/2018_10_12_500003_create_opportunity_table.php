<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
            $table->integer('organization_id');
            $table->string('opportunity');
            $table->string('stages');
            $table->integer('customer_id')->nullable();
            $table->float('expected_revenue', 10, 0);
            $table->string('probability');
            $table->integer('sales_person_id')->nullable();
            $table->integer('sales_team_id')->nullable();
            $table->date('next_action');
            $table->date('expected_closing');
            $table->string('lost_reason')->nullable();
            $table->text('internal_notes')->nullable();
            $table->integer('assigned_partner_id');
            $table->integer('is_archived');
            $table->integer('is_delete_list');
            $table->integer('is_converted_list');
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
        Schema::dropIfExists('opportunity');
    }
}
