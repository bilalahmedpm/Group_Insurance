<?php

use Illuminate\Database\Seeder;
use App\Relation;

class Relation_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relation::create([
           'relation_code' => '01',
            'relation_desc' => 'Self',
        ]);
        Relation::create([
            'relation_code' => '02',
            'relation_desc' => 'Widow',
        ]);
        Relation::create([
            'relation_code' => '03',
            'relation_desc' => 'Second Widow',
        ]);
        Relation::create([
            'relation_code' => '04',
            'relation_desc' => 'Third Widow',
        ]);
        Relation::create([
            'relation_code' => '05',
            'relation_desc' => 'Fourth Widow',
        ]);
        Relation::create([
            'relation_code' => '06',
            'relation_desc' => 'Father',
        ]);
        Relation::create([
            'relation_code' => '07',
            'relation_desc' => 'Mother',
        ]);
        Relation::create([
            'relation_code' => '08',
            'relation_desc' => 'Brother',
        ]);
        Relation::create([
            'relation_code' => '09',
            'relation_desc' => 'Sister',
        ]);
        Relation::create([
            'relation_code' => '10',
            'relation_desc' => 'Daughter',
        ]);
        Relation::create([
            'relation_code' => '11',
            'relation_desc' => 'Son',
        ]);
        Relation::create([
            'relation_code' => '12',
            'relation_desc' => 'Husband',
        ]);
    }
}
