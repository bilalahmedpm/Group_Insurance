<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
          ['name' => 'ABL'],
          ['name' => 'ABL Islamic'],
          ['name' => 'Askari Bank'],
          ['name' => 'Bank Al Baraka'],
          ['name' => 'Bank Al Falah'],
          ['name' => 'Bank Al Falah Islamic'],
          ['name' => 'Bank Al Habib'],
          ['name' => 'Bank Islami'],
          ['name' => 'Bank of Khyber'],
          ['name' => 'Bank of Punjab'],
          ['name' => 'Dubai Islamic Bank'],
          ['name' => 'Faysal Bank'],
          ['name' => 'First Micro Finance'],
          ['name' => 'First Women Bank'],
          ['name' => 'Habib Metropolitan'],
          ['name' => 'HBL'],
          ['name' => 'JS Bank'],
          ['name' => 'MCB'],
          ['name' => 'MCB Islamic'],
          ['name' => 'Meezan Bank'],
          ['name' => 'NBP'],
          ['name' => 'Samba Bank'],
          ['name' => 'Silk Bank'],
          ['name' => 'Sindh Bank'],
          ['name' => 'SME Bank'],
          ['name' => 'Soneri Bank'],
          ['name' => 'Standard Chartered Bank'],
          ['name' => 'Summit Bank'],
          ['name' => 'UBL'],
          ['name' => 'UBL Ameen'],
          ['name' => 'ZTBL'],
        ];
        \App\Bank::insert($banks);
    }
}
