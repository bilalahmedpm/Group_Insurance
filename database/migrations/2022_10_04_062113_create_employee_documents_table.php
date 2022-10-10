<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            //employee id
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            // Images
            $table->string('employee_cnic_img')->nullable();                  //self case  $ Death After Retirement  (required)
            $table->longText('beneficiary_cnic1_img')->nullable();              //Death Case $ Death After Retirement  (required) one beneficiary
            $table->longText('beneficiary_cnic2_img')->nullable();              //Death Case $ Death After Retirement  (required) in case of 2 beneficiaries
            $table->longText('employee_pension_sheet_img')->nullable();         //self Case (required)
            $table->longText('beneficiary_pension_sheet1_img')->nullable();     //Death $ Death After Retirement  (required) in case of 1 beneficiary
            $table->longText('beneficiary_pension_sheet2_img')->nullable();     //Death $ Death After Retirement  (required) in case of 2 beneficiaries both sheet 1 and sheet 2 required
            $table->string('part3form_b')->nullable();                        //self Case $ Death After Retirement  (required in both cases)
            $table->string('stamp_paper')->nullable();                        //self Case $ Death After Retirement  (required in both cases)
            $table->string('retirement_order')->nullable();                   //self Case $ Death After Retirement  (required  in both cxases)
            $table->string('contribution_statement')->nullable();             //self Case $ Death After Retirement  (required in both cases)
            $table->string('death_certificate')->nullable();                  //Death Case $ Death After Retirement  (required)
            $table->string('succession_certificate')->nullable();             //Death Case $ Death After Retirement  (required)
            $table->string('death_claim_farm')->nullable();                   //Death Case $ Death After Retirement  (required)
            $table->string('bank_farm')->nullable();                          //Death Case $ Death After Retirement  (required)
            $table->string('lpc')->nullable();                                //Death Case (required)
           //user id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('employee_documents');
    }
}
