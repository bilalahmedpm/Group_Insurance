<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
         $this->call(Relation_Seeder::class);
         $this->call(GradeSeeder::class);
         $this->call(DepartmentSeeder::class);
         $this->call(DesignationSeeder::class);
         $this->call(BankSeeder::class);
         $this->call(BranchSeeder::class);
         $this->call(UserRoleSeeder::class);
         $this->call(GiRateSeeder::class);


    }
}
