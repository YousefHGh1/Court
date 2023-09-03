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


        Schema::create('maindata_emps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->string('appointment_type');
            $table->string('named_ministry');

            $table->date('Work_start_date');
            $table->text('Work_start_file');


            $table->date('ministry_date_appointment');
            $table->text('ministry_file_appointment');

            $table->date('ministry_installation_date');
            $table->text('ministry_installation_file');

            // $table->string('religion');
            $table->string('circle');
            $table->string('section');
            $table->string('division');
            $table->string('named');

            $table->float('salary');
            $table->string('salary_status');

            $table->integer('vacation_days');


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
        Schema::dropIfExists('maindata_emps');
    }
};