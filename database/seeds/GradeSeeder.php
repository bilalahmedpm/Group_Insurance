<?php

use Illuminate\Database\Seeder;
use App\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            ['grade' => '01'],
            ['grade' => '02'],
            ['grade' => '03'],
            ['grade' => '04'],
            ['grade' => '05'],
            ['grade' => '06'],
            ['grade' => '07'],
            ['grade' => '08'],
            ['grade' => '09'],
            ['grade' => '10'],
            ['grade' => '11'],
            ['grade' => '12'],
            ['grade' => '13'],
            ['grade' => '14'],
            ['grade' => '15'],
            ['grade' => '16'],
            ['grade' => '17'],
            ['grade' => '18'],
            ['grade' => '19'],
            ['grade' => '20'],
            ['grade' => '21'],
            ['grade' => '22'],
        ];
        Grade::insert($grades);
    }
}
