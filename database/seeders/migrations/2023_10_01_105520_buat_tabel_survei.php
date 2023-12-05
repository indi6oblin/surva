<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelSurvei extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survei', function (Blueprint $table) {
            $table->unsignedInteger('id_survei')->autoIncrement();
            $table->unsignedInteger('id_klien');
            $table->string('judul');
            $table->string('deskripsi');
            $table->unsignedInteger('jumlah_responden');
            $table->unsignedInteger('poin');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->foreign('id_klien')->references('id_klien')->on('klien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survei');
    }
}
