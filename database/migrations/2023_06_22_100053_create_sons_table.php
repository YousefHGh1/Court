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
        Schema::create('sons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->integer('id_son')->nullable();
            $table->string('son_name')->nullable();
            $table->string('son_satuts')->nullable();
            $table->string('son_gender')->nullable();
            $table->date('son_birth')->nullable();
            $table->string('son_job')->nullable();
            $table->string('son_unv')->nullable();
            $table->text('son_file')->nullable();
            $table->string('son_unv_name')->nullable();
            $table->string('son_major')->nullable();
            $table->date('son_study_start')->nullable();
            $table->text('son_unv_file')->nullable();
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
        Schema::dropIfExists('sons');
    }
};