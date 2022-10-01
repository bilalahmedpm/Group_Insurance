<?php

use Illuminate\Database\Seeder;

class GiRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = [
          ['Grade' => '01' , 'Retirement' => '25000' , 'Death' => '120000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '02' , 'Retirement' => '25000' , 'Death' => '120000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '03' , 'Retirement' => '25000' , 'Death' => '120000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '04' , 'Retirement' => '25000' , 'Death' => '120000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '05' , 'Retirement' => '25000' , 'Death' => '150000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '06' , 'Retirement' => '25000' , 'Death' => '150000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '07' , 'Retirement' => '25000' , 'Death' => '150000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '08' , 'Retirement' => '25000' , 'Death' => '150000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '09' , 'Retirement' => '25000' , 'Death' => '150000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '10' , 'Retirement' => '25000' , 'Death' => '150000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '11' , 'Retirement' => '40000' , 'Death' => '250000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '12' , 'Retirement' => '40000' , 'Death' => '250000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '13' , 'Retirement' => '40000' , 'Death' => '250000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '14' , 'Retirement' => '40000' , 'Death' => '250000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '15' , 'Retirement' => '40000' , 'Death' => '250000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '16' , 'Retirement' => '50000' , 'Death' => '400000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '17' , 'Retirement' => '50000' , 'Death' => '500000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '18' , 'Retirement' => '50000' , 'Death' => '700000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '19' , 'Retirement' => '50000' , 'Death' => '1000000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '20' , 'Retirement' => '50000' , 'Death' => '1000000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '21' , 'Retirement' => '50000' , 'Death' => '1000000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => '22' , 'Retirement' => '50000' , 'Death' => '1000000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],
          ['Grade' => 'special' , 'Retirement' => '50000' , 'Death' => '1000000' , 'BeginDate' => '2007-07-01' , 'EndDate' => '2008-12-31'],

        ];
        \App\GiRate::insert($rates);
    }
}
