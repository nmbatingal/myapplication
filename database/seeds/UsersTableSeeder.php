<?php

use Illuminate\Database\Seeder;
use App\User;
// use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role_admin = Role::where('name', 'admin')->first();

        $users = [
            [
                'username'      => 'admin',
                'password'      => bcrypt('dostcaraga'),
                'lastname'      => 'account',
                'firstname'     => 'admin',
                'email'         => 'dostcaraga@gmail.com',
                '__isActive'    => 1,
                '__isAdmin'     => 1,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
                // ->roles()->attach($role_admin);
        }
    }
}
