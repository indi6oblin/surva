<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveiTerjawabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survei_terjawab', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_responden');
            $table->unsignedInteger('id_survei');
            $table->timestamps();

            $table->foreign('id_survei')->references('id_survei')->on('survei')->onDelete('cascade');
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
        Schema::dropIfExists('survei_terjawabs');
    }
}
