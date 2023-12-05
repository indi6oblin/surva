<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSurveiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_survei', function (Blueprint $table) {
            $table->increments('id_hasil');
            $table->unsignedInteger('id_pertanyaan');
            $table->unsignedInteger('id_responden');
            $table->string('hasil_opsi');
            $table->timestamps();

            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaan')->onDelete('cascade');
            $table->foreign('id_responden')->references('id_responden')->on('responden')->onDelete('cascade');
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
