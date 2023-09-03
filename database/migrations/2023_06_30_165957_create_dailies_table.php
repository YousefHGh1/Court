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
        Schema::create('dailies', function (Blueprint $table) {
            $table->id();
            $table->integer('id_daily');
            $table->string('daily_name');
            $table->string('daily_gender');
            $table->string('daily_status');
            $table->string('daily_address');
            $table->integer('daily_mobile');
            $table->date('daily_birthdate');
            $table->string('daily_degree');

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
        Schema::dropIfExists('dailies');
    }
};
