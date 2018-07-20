<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(RolesTableSeeder::class);
		$this->call(PermissionTableSeeder::class);
		$this->call(RoleHasPermissionTableSeeder::class);
		$this->call(UserTableSeeder::class);
		$this->call(PaymentgatewayTypeSeeder::class);
		
    }
} 
