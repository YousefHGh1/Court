<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sick_holidays', function (Blueprint $table) {
            $table->id();
            $table->string('holiday_reason');
            $table->string('employee_id');
            $table->integer('employee_num');
            $table->string('holiday_place');
            $table->string('holiday_address');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('sub_employee');
            $table->string('note');
            $table->text('file');
            $table->integer('holiday_balance');
            $table->integer('spent_balance');
            $table->integer('remaining_balance');
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
        Schema::dropIfExists('sick_holidays');
    }
};