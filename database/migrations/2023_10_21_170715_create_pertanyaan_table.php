<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->increments('id_pertanyaan');
            $table->unsignedInteger('id_survei');
            $table->text('pertanyaan');
            $table->string('opsi_1');
            $table->string('opsi_2');
            $table->string('opsi_3')->nullable();
            $table->string('opsi_4')->nullable();
            $table->string('opsi_5')->nullable();
            $table->timestamps();

            $table->foreign('id_survei')->references('id_survei')->on('survei')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan');
    }
}
