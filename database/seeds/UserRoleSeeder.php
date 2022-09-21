<?php

use Illuminate\Database\Seeder;
use App\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'role' => '1',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => '2',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role' => '3',
            'password' => Hash::make('12345678'),
        ]);
    }
}
