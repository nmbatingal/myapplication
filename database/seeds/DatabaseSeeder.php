<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

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
        }
    }
}
