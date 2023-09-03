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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('id_employee');
            $table->integer('employee_num');
            $table->string('employee_name');
            $table->string('employee_email');
            $table->string('employee_gender');
            $table->string('employee_status');
            $table->string('employee_address');
            $table->integer('employee_mobile');
            $table->date('employee_birthdate');
            $table->string('employee_birthplace');
            $table->integer('vacation_days')->nullable();
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
};