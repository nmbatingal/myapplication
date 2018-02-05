<?php

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();

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
            User::create($user)
                ->roles()->sync($role_admin);
        }
    }
}
