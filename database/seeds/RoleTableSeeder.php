<?php

use Illuminate\Database\Seeder;
use App\Role;

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
                'name'         => 'admin',
                'description'  => 'an admin level user',
            ],
            [
                'name'         => 'member',
                'description'  => 'a member level user',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
