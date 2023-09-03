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
        Schema::create('contract2s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contract1s')->onDelete('cascade');
            
            $table->string('contract_type');
            $table->integer('contract_value');
            
            $table->date('contract_start_date');
            $table->date('contract_end_date');

            $table->string('operator');
            $table->string('workplace');
            $table->string('circle');
            $table->string('section');
            $table->string('division');
            $table->string('named');
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
        Schema::dropIfExists('contract2s');
    }
};
