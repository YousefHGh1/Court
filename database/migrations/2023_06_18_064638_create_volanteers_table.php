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
        Schema::create('volanteers', function (Blueprint $table) {
            $table->id();
            $table->integer('id_volanteer');
            $table->string('volanteer_email');
            $table->string('volanteer_name');
            $table->string('volanteer_gender');
            $table->string('volanteer_status');
            $table->string('volanteer_address');
            $table->integer('volanteer_mobile');
            $table->date('volanteer_birthdate');
            $table->string('volanteer_degree');
            $table->string('volanteer_major');
            $table->string('volanteer_graduation');
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
        Schema::dropIfExists('volanteers');
    }
};
