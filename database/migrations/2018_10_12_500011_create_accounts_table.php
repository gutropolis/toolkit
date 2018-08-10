<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('account_type')->nullable();  //account is an entity (individual or an enterprise)
			$table->string('name')->nullable();
			$table->string('description')->nullable();
            $table->string('email')->nullable();  
			
			$table->string('industry')->nullable();
			$table->string('office_phone')->nullable();
			$table->string('mobile_phone')->nullable();
			$table->string('home_phone')->nullable();
			$table->string('primary_email')->nullable();
			$table->string('alternate_email')->nullable();
			$table->string('account_id')->nullable();  //Member of organisation
			$table->string('ownership')->nullable();   
			
			$table->string('sic_code')->nullable();   
			$table->string('sla_name')->nullable();   
			$table->string('sla_name')->nullable();   
			$table->string('gstin')->nullable(); 
			
			
			//Billing Address
			$table->string('billing_address_street')->nullable();  
			$table->string('billing_address_city')->nullable(); 
			$table->string('billing_address_state'); 
			$table->string('billing_address_country')->nullable();
			$table->string('billing_address_postal_code')->nullable(); 
			$table->string('billing_address')->nullable(); 
			 
			//Shipping Address
			$table->string('shipping_address_street')->nullable();  
			$table->string('shipping_address_city')->nullable(); 
			$table->string('shipping_address_state'); 
			$table->string('shipping_address_country')->nullable();
			$table->string('shipping_address_postal_code')->nullable(); 
			$table->string('billing_address')->nullable(); 
			 
			 
			$table->string('annuel_revinue')->nullable(); 
			$table->string('website')->nullable();
			$table->string('currency')->nullable();
			$table->string('language')->nullable(); 
			$table->string('vat')->nullable();
			$table->string('country')->nullable(); 
            $table->string('fax')->nullable();
			$table->string('logo')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
/*At a minimum, we recommend an Opportunity contain the following information:

    The business challenge being solved
    A projected Close Date
    A projected Deal Size (amount of revenue)
    Competitors being considered for the project
    The name of the final decision maker.
*/