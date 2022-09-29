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
            $table->char('pno' , '8')->unique();
            $table->string('employeecnic','15')->unique();
            $table->string('employeename')->nullable();
            $table->string('fathername')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->string('grade' , '2')->nullable();
            $table->string('gitype' , '2')->nullable();
            $table->string('retirementdate')->nullable();
            $table->string('dateofdeath')->nullable();
            $table->string('legalheirs', '1')->nullable();
            $table->string('status')->nullable();
            $table->biginteger('contribution')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
