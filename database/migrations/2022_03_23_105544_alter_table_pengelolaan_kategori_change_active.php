<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePengelolaanKategoriChangeActive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::table('pengelolaan_kategori', function (Blueprint $table) {

            $table->enum("ACTIVE",['1', '0'])->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengelolaan_kategori', function (Blueprint $table) {
            $table->dropColumn('ACTIVE');
        });
    }
}
