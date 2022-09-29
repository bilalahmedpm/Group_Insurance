<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['department_code' => '0001' , 'department_desc' => 'Admn of Justivce'],
            ['department_code' => '0002' , 'department_desc' => 'Agriculture'],
            ['department_code' => '0003' , 'department_desc' => 'Archaeology, Museums & Libraries'],
            ['department_code' => '0004' , 'department_desc' => 'Auqaf Department'],
            ['department_code' => '0005' , 'department_desc' => 'Balochistan Assembly'],
            ['department_code' => '0006' , 'department_desc' => 'Balochistan Constabulary'],
            ['department_code' => '0007' , 'department_desc' => 'Balochistan Public Service Comm'],
            ['department_code' => '0008' , 'department_desc' => 'Board of Revenue'],
            ['department_code' => '0009' , 'department_desc' => 'C&W'],
            ['department_code' => '0010' , 'department_desc' => 'Chief Ministers Sectt'],
            ['department_code' => '0011' , 'department_desc' => 'Civil Defence'],
            ['department_code' => '0012' , 'department_desc' => 'CM House'],
            ['department_code' => '0013' , 'department_desc' => 'CMIT'],
            ['department_code' => '0014' , 'department_desc' => 'Cooperation'],
            ['department_code' => '0015' , 'department_desc' => 'Culture'],
            ['department_code' => '0016' , 'department_desc' => 'DC Office'],
            ['department_code' => '0017' , 'department_desc' => 'Education'],
            ['department_code' => '0018' , 'department_desc' => 'Energy'],
            ['department_code' => '0019' , 'department_desc' => 'Environment'],
            ['department_code' => '0020' , 'department_desc' => 'Excise and Taxation'],
            ['department_code' => '0021' , 'department_desc' => 'Finance'],
            ['department_code' => '0022' , 'department_desc' => 'Fisheries'],
            ['department_code' => '0023' , 'department_desc' => 'Food'],
            ['department_code' => '0024' , 'department_desc' => 'Forests and Wildlife'],
            ['department_code' => '0025' , 'department_desc' => 'General Admn'],
            ['department_code' => '0026' , 'department_desc' => 'Governor House'],
            ['department_code' => '0027' , 'department_desc' => 'Governor Secretariat'],
            ['department_code' => '0028' , 'department_desc' => 'Health'],
            ['department_code' => '0029' , 'department_desc' => 'High Court'],
            ['department_code' => '0030' , 'department_desc' => 'Higher Education'],
            ['department_code' => '0031' , 'department_desc' => 'Home Department'],
            ['department_code' => '0032' , 'department_desc' => 'Industries'],
            ['department_code' => '0033' , 'department_desc' => 'Information'],
            ['department_code' => '0034' , 'department_desc' => 'Information Technology'],
            ['department_code' => '0035' , 'department_desc' => 'Inter Provincial Coordination'],
            ['department_code' => '0036' , 'department_desc' => 'Irrigation'],
            ['department_code' => '0037' , 'department_desc' => 'Jails'],
            ['department_code' => '0038' , 'department_desc' => 'Labour and Manpower'],
            ['department_code' => '0039' , 'department_desc' => 'Land Revenue'],
            ['department_code' => '0040' , 'department_desc' => 'Law Department'],
            ['department_code' => '0041' , 'department_desc' => 'Legal Services and Law Affairs'],
            ['department_code' => '0042' , 'department_desc' => 'Levies'],
            ['department_code' => '0043' , 'department_desc' => 'Livestock'],
            ['department_code' => '0044' , 'department_desc' => 'Local Government'],
            ['department_code' => '0045' , 'department_desc' => 'Medical Education'],
            ['department_code' => '0046' , 'department_desc' => 'Mines and Minerals'],
            ['department_code' => '0047' , 'department_desc' => 'Minorities Affairs Department'],
            ['department_code' => '0048' , 'department_desc' => 'P&D'],
            ['department_code' => '0049' , 'department_desc' => 'PDMA'],
            ['department_code' => '0050' , 'department_desc' => 'PHE'],
            ['department_code' => '0051' , 'department_desc' => 'Police'],
            ['department_code' => '0052' , 'department_desc' => 'Population Welfare'],
            ['department_code' => '0053' , 'department_desc' => 'Prisons'],
            ['department_code' => '0054' , 'department_desc' => 'Prosecution'],
            ['department_code' => '0055' , 'department_desc' => 'Provincial Assembly'],
            ['department_code' => '0056' , 'department_desc' => 'Provincial Ombudsman'],
            ['department_code' => '0057' , 'department_desc' => 'Religious Affairs'],
            ['department_code' => '0058' , 'department_desc' => 'Rural Development'],
            ['department_code' => '0059' , 'department_desc' => 'S&GAD'],
            ['department_code' => '0060' , 'department_desc' => 'Secondary Education'],
            ['department_code' => '0061' , 'department_desc' => 'Social Welfare'],
            ['department_code' => '0062' , 'department_desc' => 'Sports'],
            ['department_code' => '0063' , 'department_desc' => 'Stationery and Printing'],
            ['department_code' => '0064' , 'department_desc' => 'Transport'],
            ['department_code' => '0065' , 'department_desc' => 'Urban Planning & Development'],
            ['department_code' => '0066' , 'department_desc' => 'Women Development'],
        ];
        \App\Department::insert($departments);
    }
}
