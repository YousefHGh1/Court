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
        Schema::create('contract1s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_contract');
            $table->integer('contract_num');
            $table->string('contract_name');
            $table->string('contract_email');
            $table->string('contract_gender');
            $table->string('contract_status');
            $table->string('contract_address');
            $table->integer('contract_mobile');
            $table->date('contract_birthdate');
            $table->string('contract_degree');
            $table->integer('contract_son')->nullable();
            $table->integer('contract_wife')->nullable();
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
        Schema::dropIfExists('contract1s');
    }
};