<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelOpsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opsi', function (Blueprint $table) {
            $table->unsignedInteger('id_opsi')->autoIncrement();
            $table->unsignedInteger('id_survei');
            $table->unsignedInteger('id_pertanyaan');
            $table->string('opsi');
            $table->foreign('id_survei')->references('id_survei')->on('survei');
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opsi');
    }
}
