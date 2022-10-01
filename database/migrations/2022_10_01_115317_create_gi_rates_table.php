<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gi_rates', function (Blueprint $table) {
            $table->id();
            $table->string('Grade');
            $table->string('Retirement');
            $table->string('Death');
            $table->string('BeginDate');
            $table->string('EndDate');
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
        Schema::dropIfExists('gi_rates');
    }
}
