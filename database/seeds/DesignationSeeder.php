<?php

use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            ['designation_code' => 'J014' , 'designation_desc' => 'Junior Clerk'],
            ['designation_code' => 'A007' , 'designation_desc' => 'Accountant'],
            ['designation_code' => 'A033' , 'designation_desc' => 'Agriculture Engineer'],
            ['designation_code' => 'A147' , 'designation_desc' => 'Assistant Professor'],
            ['designation_code' => 'A200' , 'designation_desc' => 'Aya / Peon'],
            ['designation_code' => 'C010' , 'designation_desc' => 'Caretaker'],
            ['designation_code' => 'S131' , 'designation_desc' => 'SST (General)'],
            ['designation_code' => 'N003' , 'designation_desc' => 'Naib Qasid'],
            ['designation_code' => 'L028' , 'designation_desc' => 'Levy Sepy'],
            ['designation_code' => 'J042' , 'designation_desc' => 'JV Teacher'],
            ['designation_code' => 'L042' , 'designation_desc' => 'LHV'],
        ];
        \App\Designation::insert($designations);
    }
}
