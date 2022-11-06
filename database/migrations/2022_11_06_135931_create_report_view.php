<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('
      CREATE VIEW Report_View
                            AS
SELECT employees.id,employees.pno,employees.employeecnic,employees.employeename,employees.fathername,employees.user_id,employees.department_id,departments.department_desc,employees.designation_id,designations.designation_desc,employees.gitype,employees.retirementdate,employees.dateofdeath,employees.ageondate,employees.contribution,employees.contactno,employees.status,employees.beneficiaries,
legalheirs.employee_id,legalheirs.heircnic,legalheirs.heirname,legalheirs.relation_id,legalheirs.bank_id,banks.name,branches.branch_code,legalheirs.branch_id,branches.branch_desc,legalheirs.accountno,legalheirs.amount

FROM
employees INNER JOIN legalheirs ON employees.id = legalheirs.employee_id
		  INNER JOIN departments ON departments.id = employees.department_id
          INNER JOIN designations ON designations.id = employees.designation_id
          INNER JOIN banks ON banks.id = legalheirs.bank_id
          INNER JOIN branches on branches.id = legalheirs.branch_id
          INNER JOIN relations on relations.id = legalheirs.relation_id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('DROP VIEW `Report_View`');
    }
}
