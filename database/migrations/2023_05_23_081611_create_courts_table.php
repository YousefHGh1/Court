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


        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->integer('jibaya_id');
            $table->decimal('amount', 10, 2);
            $table->string('address')->nullable();
            $table->string('action_type')->nullable();
            $table->integer('case_num')->nullable();
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
        Schema::dropIfExists('courts');
    }
};