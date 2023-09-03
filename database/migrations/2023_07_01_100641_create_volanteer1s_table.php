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
        Schema::create('volanteer1s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('volanteer_id');
            $table->foreign('volanteer_id')->references('id')->on('volanteers')->onDelete('cascade');

            $table->string('volanteer_type');
            $table->integer('volanteer_duration');
            $table->string('circle');
            $table->string('section');
            $table->string('division');
            $table->string('named');
            $table->date('volanteer_start_date');
            $table->date('volanteer_end_date');
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
        Schema::dropIfExists('volanteer1s');
    }
};
