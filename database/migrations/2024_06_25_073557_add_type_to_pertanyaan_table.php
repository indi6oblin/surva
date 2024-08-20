<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToPertanyaanTable extends Migration
{
    public function up()
    {
        Schema::table('pertanyaan', function (Blueprint $table) {
            if (!Schema::hasColumn('pertanyaan', 'type')) {
                $table->string('type')->default('multiple_choice')->nullable(false);
            }
        });
    }
    

    public function down()
    {
        Schema::table('pertanyaan', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}

