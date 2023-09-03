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
        Schema::create('normal_holidays', function (Blueprint $table) {
            $table->id();
            $table->string('holiday_reason');
            // $table->string('employee_id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->integer('employee_num');
            $table->string('holiday_place');
            $table->string('holiday_address');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('sub_employee');
            $table->string('note');
            $table->text('file');
            $table->integer('vacation_days');
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
        Schema::dropIfExists('normal_holidays');
    }
};