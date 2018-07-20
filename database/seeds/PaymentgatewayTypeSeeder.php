<?php

use Illuminate\Database\Seeder;
use Gutropolis\PaymentgatewayType;
class PaymentgatewayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		 $data = [ 'title' => 'Paypal', 'image_url' => 'abc', 'status' => '1','order' => '2' ];
		    PaymentgatewayType::create($data); 
			$data = [ 'title' => 'Stripe', 'image_url' => 'abc', 'status' => '1','order' => '2' ];
		    PaymentgatewayType::create($data); 
			$data = [ 'title' => 'Indian', 'image_url' => 'abc', 'status' => '1','order' => '2' ];
		    PaymentgatewayType::create($data); 
			$data = [ 'title' => 'Check', 'image_url' => 'abc', 'status' => '1','order' => '2' ];
		    PaymentgatewayType::create($data); 
    }
}
