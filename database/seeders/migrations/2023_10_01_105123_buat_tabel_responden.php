<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelResponden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responden', function (Blueprint $table) {
            $table->unsignedInteger('id_responden')->autoIncrement();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('alamat')->nullable();
            $table->string('password');
            $table->unsignedInteger('poin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responden');
    }
}
