<?php

use Illuminate\Database\Seeder;
use Gutropolis\User;
use Spatie\Permission\Models\Role; 
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           

        $userArr= array(

            'name' => 'Sandeep',

            'email' => 'gutropolis@gmail.com',

            'password' => '123456' 

        ); 

        $userArr['password'] = Hash::make('123456'); 

        $user = User::create($userArr);

        $user->assignRole('1');

    }
}
