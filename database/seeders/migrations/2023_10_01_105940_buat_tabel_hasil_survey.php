<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelHasilSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_survei', function (Blueprint $table) {
            $table->unsignedInteger('id_hasil_survei')->autoIncrement();
            $table->unsignedInteger('id_opsi');
            $table->unsignedInteger('id_responden');
            $table->foreign('id_opsi')->references('id_opsi')->on('opsi');
            $table->foreign('id_responden')->references('id_responden')->on('responden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_survei');
    }
}
