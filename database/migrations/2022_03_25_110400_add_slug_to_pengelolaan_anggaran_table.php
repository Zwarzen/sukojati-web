<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToPengelolaanAnggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengelolaan_anggaran', function (Blueprint $table) {
            $table->text('slug')->after('judul_dokumen');
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
            $table->dropColumn('slug');
        });
    }
}
