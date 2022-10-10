<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->char('pno' , '8')->unique();                                                                            //unique and to be checked with old data do not duplicate
            $table->string('employeecnic','15')->unique();                                                                    //unique and to be checked with old data do not duplicate
            $table->string('employeename')->nullable();
            $table->string('fathername')->nullable();
            $table->string('dateofbirth')->nullable();                                                                               // dd/mm/yyy
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->string('grade' , '2')->nullable();                                                                      // 01.02.03.04 format
            $table->string('gitype' , '2')->nullable();                                                                      // 01 = retirement 02= Death 03=Death After Retirement
            $table->string('retirementdate')->nullable();                                                                            //  DD/MM/YYYY
            $table->string('dateofdeath')->nullable();                                                                               //  DD/MM/YYYY
            $table->string('beneficiaries', '1')->nullable();                                                               //legalheirs changed to beneficiaries    // if B= 1 than beneficiary will also enter 1 if 2 then beneficiary will be 2 and amount should be dividied by 2
            $table->string('status')->nullable();                                                                                   // 0 = Pending (default) 1  = objection 2= checked and processed  3 = cross chequed with employee data  4 = Awaiting for meeting 5= Approved
            $table->biginteger('contribution')->nullable();                                                                           // retirement and Death after retirement (required) in case of death default value is 0 save
            $table->string('contactno')->nullable();
            // ADD NEW FIELD
            $table->string('ageondate')->nullable();
            $table->string('beneficiarycnic')->nullable();
            $table->string('beneficiaryname')->nullable();
            $table->string('relation')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('accountno')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
