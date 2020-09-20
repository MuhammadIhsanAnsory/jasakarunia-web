<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123123123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => bcrypt('123123123'),
            'role' => 'user',
        ]);
    }
}
