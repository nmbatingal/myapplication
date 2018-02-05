<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
            [
                'name' => 'Admin',
            ],
        ];

        foreach ($roles as $role) {
            $p = Permission::where('name', 'administrator')->firstOrFail();

            Role::create($role)
                ->givePermissionTo($p);
        }

    }
}
