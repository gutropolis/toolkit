<?php

use Illuminate\Database\Seeder;

 
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
 

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$rolePermissions = ['1','2','3','4'];
		 $role = Role::find('1');
		$role->syncPermissions($rolePermissions);
        

    }
}
