<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survei', function (Blueprint $table) {
            $table->increments('id_survei');
            $table->unsignedInteger('id_klien');
            // $table->unsignedInteger('id_admin');
            $table->unsignedInteger('jumlah_responden')->nullable();
            $table->unsignedInteger('poin')->nullable();
            $table->string('bukti')->nullable();
            $table->unsignedInteger('nominal')->nullable();
            $table->string('judul', 256)->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('deskripsi_validasi')->nullable();
            $table->text('rincian_harga')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->enum('status', ['Sortir','Belum Bayar','Sudah Bayar','Disetujui','Dibatalkan'])->default('Sortir');
            // $table->enum('status_bayar', ['Belum Bayar', 'Sudah Bayar'])->nullable();
            // $table->enum('status_survei', ['Sortir', 'DIsetujui', 'Dibatalkan'])->nullable();
            $table->timestamps();

            $table->foreign('id_klien')->references('id_klien')->on('klien')->onDelete('cascade');
            // $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //     Schema::create('survei', function (Blueprint $table) {
    //         $table->dropColumn('id_admin');
    //     });
    }
}
