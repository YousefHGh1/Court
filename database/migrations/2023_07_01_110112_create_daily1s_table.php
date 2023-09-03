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
        Schema::create('daily1s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daily_id');
            $table->foreign('daily_id')->references('id')->on('dailies')->onDelete('cascade');
            
            $table->integer('daily_fare');
            $table->integer('monthly_fare');
            $table->date('work_start_date');
            $table->date('work_end_date');
            $table->string('circle');
            $table->string('section');
            $table->string('division');
            $table->string('named');
            $table->string('kara');
            $table->text('file');
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
        Schema::dropIfExists('daily1s');
    }
};
