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
            //first notification
          ['grade' => '01' , 'retirement' => '25000' , 'death' => '120000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '02' , 'retirement' => '25000' , 'death' => '120000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '03' , 'retirement' => '25000' , 'death' => '120000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '04' , 'retirement' => '25000' , 'death' => '120000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '05' , 'retirement' => '25000' , 'death' => '150000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '06' , 'retirement' => '25000' , 'death' => '150000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '07' , 'retirement' => '25000' , 'death' => '150000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '08' , 'retirement' => '25000' , 'death' => '150000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '09' , 'retirement' => '25000' , 'death' => '150000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '10' , 'retirement' => '25000' , 'death' => '150000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '11' , 'retirement' => '40000' , 'death' => '250000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '12' , 'retirement' => '40000' , 'death' => '250000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '13' , 'retirement' => '40000' , 'death' => '250000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '14' , 'retirement' => '40000' , 'death' => '250000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '15' , 'retirement' => '40000' , 'death' => '250000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '16' , 'retirement' => '50000' , 'death' => '400000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '17' , 'retirement' => '50000' , 'death' => '500000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '18' , 'retirement' => '50000' , 'death' => '700000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '19' , 'retirement' => '50000' , 'death' => '1000000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '20' , 'retirement' => '50000' , 'death' => '1000000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '21' , 'retirement' => '50000' , 'death' => '1000000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => '22' , 'retirement' => '50000' , 'death' => '1000000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
          ['grade' => 'special' , 'retirement' => '50000' , 'death' => '1000000' , 'begindate' => '2007-07-01' , 'enddate' => '2008-12-31'],
            //second notification
          ['grade' => '01' , 'retirement' => '120000' , 'death' => '120000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '02' , 'retirement' => '120000' , 'death' => '120000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '03' , 'retirement' => '120000' , 'death' => '120000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '04' , 'retirement' => '120000' , 'death' => '120000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '05' , 'retirement' => '150000' , 'death' => '150000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '06' , 'retirement' => '150000' , 'death' => '150000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '07' , 'retirement' => '150000' , 'death' => '150000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '08' , 'retirement' => '150000' , 'death' => '150000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '09' , 'retirement' => '150000' , 'death' => '150000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '10' , 'retirement' => '150000' , 'death' => '150000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '11' , 'retirement' => '250000' , 'death' => '250000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '12' , 'retirement' => '250000' , 'death' => '250000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '13' , 'retirement' => '250000' , 'death' => '250000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '14' , 'retirement' => '250000' , 'death' => '250000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '15' , 'retirement' => '250000' , 'death' => '250000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '16' , 'retirement' => '400000' , 'death' => '400000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '17' , 'retirement' => '500000' , 'death' => '500000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '18' , 'retirement' => '700000' , 'death' => '700000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '19' , 'retirement' => '850000' , 'death' => '850000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '20' , 'retirement' => '1000000' , 'death' => '1000000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '21' , 'retirement' => '1000000' , 'death' => '1000000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => '22' , 'retirement' => '1000000' , 'death' => '1000000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],
          ['grade' => 'special' , 'retirement' => '1000000' , 'death' => '1000000' , 'begindate' => '2009-01-01' , 'enddate' => '2010-06-30'],

            //third notification
          ['grade' => '01' , 'retirement' => '120000' , 'death' => '150000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '02' , 'retirement' => '120000' , 'death' => '150000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '03' , 'retirement' => '120000' , 'death' => '150000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '04' , 'retirement' => '120000' , 'death' => '150000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '05' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '06' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '07' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '08' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '09' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '10' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '11' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '12' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '13' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '14' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '15' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '16' , 'retirement' => '400000' , 'death' => '500000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '17' , 'retirement' => '500000' , 'death' => '625000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '18' , 'retirement' => '700000' , 'death' => '875000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '19' , 'retirement' => '850000' , 'death' => '1062500' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '20' , 'retirement' => '1000000' , 'death' => '1250000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '21' , 'retirement' => '1000000' , 'death' => '1250000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => '22' , 'retirement' => '1000000' , 'death' => '1250000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],
          ['grade' => 'special' , 'retirement' => '1000000' , 'death' => '1250000' , 'begindate' => '2010-07-01' , 'enddate' => '2012-06-30'],

        //Fourth Notification
          ['grade' => '01' , 'retirement' => '120000' , 'death' => '150000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '02' , 'retirement' => '120000' , 'death' => '150000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '03' , 'retirement' => '120000' , 'death' => '150000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '04' , 'retirement' => '120000' , 'death' => '150000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '05' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '06' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '07' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '08' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '09' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '10' , 'retirement' => '150000' , 'death' => '187500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '11' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '12' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '13' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '14' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '15' , 'retirement' => '250000' , 'death' => '312500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '16' , 'retirement' => '400000' , 'death' => '500000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '17' , 'retirement' => '500000' , 'death' => '625000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '18' , 'retirement' => '700000' , 'death' => '875000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '19' , 'retirement' => '850000' , 'death' => '1062500' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '20' , 'retirement' => '1000000' , 'death' => '1250000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '21' , 'retirement' => '1000000' , 'death' => '1250000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => '22' , 'retirement' => '1000000' , 'death' => '1250000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],
          ['grade' => 'special' , 'retirement' => '1000000' , 'death' => '1250000' , 'begindate' => '2012-07-01' , 'enddate' => '2018-12-31'],

            //Fifth Notification
            ['grade' => '01' , 'retirement' => '310000' , 'death' => '310000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '02' , 'retirement' => '320000' , 'death' => '320000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '03' , 'retirement' => '330000' , 'death' => '330000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '04' , 'retirement' => '340000' , 'death' => '340000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '05' , 'retirement' => '350000' , 'death' => '350000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '06' , 'retirement' => '360000' , 'death' => '360000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '07' , 'retirement' => '380000' , 'death' => '380000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '08' , 'retirement' => '390000' , 'death' => '390000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '09' , 'retirement' => '400000' , 'death' => '400000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '10' , 'retirement' => '420000' , 'death' => '420000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '11' , 'retirement' => '430000' , 'death' => '430000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '12' , 'retirement' => '460000' , 'death' => '460000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '13' , 'retirement' => '490000' , 'death' => '490000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '14' , 'retirement' => '520000' , 'death' => '520000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '15' , 'retirement' => '550000' , 'death' => '550000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '16' , 'retirement' => '650000' , 'death' => '650000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '17' , 'retirement' => '930000' , 'death' => '930000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '18' , 'retirement' => '1200000' , 'death' => '1200000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '19' , 'retirement' => '1800000' , 'death' => '1800000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '20' , 'retirement' => '2100000' , 'death' => '2100000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '21' , 'retirement' => '2400000' , 'death' => '2400000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
            ['grade' => '22' , 'retirement' => '2500000' , 'death' => '2500000' , 'begindate' => '2019-01-01' , 'enddate' => '2099-12-31'],
        ];
        \App\GiRate::insert($rates);
    }
}
