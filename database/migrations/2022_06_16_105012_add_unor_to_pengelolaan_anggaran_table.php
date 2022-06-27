<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnorToPengelolaanAnggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengelolaan_anggaran', function (Blueprint $table) {
            //
            $table->string('unor')->after('id_dinas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengelolaan_anggaran', function (Blueprint $table) {
            //
        });
    }
}
