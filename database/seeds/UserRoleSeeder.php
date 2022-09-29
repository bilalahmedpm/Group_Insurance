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
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'phone'=> '03211234567',
            'password' => Hash::make('12345678'),
            'role' => '1', //1 = superadmin 2= user
            'department_id' => '21',
            'status' => 'active',
            'address' =>'block 5',

        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'phone'=> '03211235452',
            'password' => Hash::make('12345678'),
            'role' => '2', //1 = superadmin 2= user
            'department_id' => '60',
            'status' => 'active',
            'address' =>'block 3',

        ]);
    }
}
