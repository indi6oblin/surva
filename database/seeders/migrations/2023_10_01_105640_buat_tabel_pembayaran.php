<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->unsignedInteger('id_pembayaran')->autoIncrement();;
            $table->unsignedInteger('id_survei');
            $table->string('status');
            $table->unsignedInteger('nominal');
            $table->string('bukti');
            $table->foreign('id_survei')->references('id_survei')->on('survei');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
