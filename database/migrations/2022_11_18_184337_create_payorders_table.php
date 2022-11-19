<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payorders', function (Blueprint $table) {
            $table->id();
            $table->char('personalnumber',8)->unique();
            $table->string('employeecnic',13)->unique();
            $table->string('employeename',50);
            $table->char('fund',2);
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->string('po_number');
            $table->string('podate');
            $table->string('recievername')->nullable();
            $table->string('recievercnic')->nullable();
            $table->string('recievercontact')->nullable();
            $table->string('recievingdate')->nullable();
            $table->string('relation')->nullable();
            $table->string('amount');
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
        Schema::dropIfExists('payorders');
    }
}
