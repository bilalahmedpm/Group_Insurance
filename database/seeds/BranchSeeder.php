<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
          ['bank_id' => '1' , 'branch_code' => '0079' , 'branch_desc' => 'Zhob Branch'],
          ['bank_id' => '1' , 'branch_code' => '0119' , 'branch_desc' => 'Jacobabad Branch'],
          ['bank_id' => '1' , 'branch_code' => '0027' , 'branch_desc' => 'Liaquat Bazar Brach'],
          ['bank_id' => '21' , 'branch_code' => '0191' , 'branch_desc' => 'Pasni Branch'],
          ['bank_id' => '21' , 'branch_code' => '0235' , 'branch_desc' => 'Ormara Branch'],
          ['bank_id' => '21' , 'branch_code' => '1083' , 'branch_desc' => 'Satellite Town Quetta'],
          ['bank_id' => '21' , 'branch_code' => '1264' , 'branch_desc' => 'Shahra-e-iqbal Branch'],
          ['bank_id' => '21' , 'branch_code' => '1069' , 'branch_desc' => 'Qandahari Bazar Branch'],
          ['bank_id' => '28' , 'branch_code' => '1146' , 'branch_desc' => 'Turbat Branch'],
          ['bank_id' => '28' , 'branch_code' => '1405' , 'branch_desc' => 'Gwadar Branch'],
          ['bank_id' => '29' , 'branch_code' => '0404' , 'branch_desc' => 'Gojra Branch'],
          ['bank_id' => '29' , 'branch_code' => '0476' , 'branch_desc' => 'Jinnah Road Qta '],
          ['bank_id' => '31' , 'branch_code' => '0100' , 'branch_desc' => 'Kohlu Branch '],
          ['bank_id' => '31' , 'branch_code' => '4092' , 'branch_desc' => 'Panjgoor Branch'],
        ];
        \App\Branches::insert($branches);
    }
}
