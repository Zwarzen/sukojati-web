<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengelolaanAnggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {
        Schema::create('pengelolaan_anggaran', function (Blueprint $table) {
            $table->id();
            $table->string("id_dokumen");
            $table->text("judul_dokumen");
            $table->integer("tanggal");
            $table->integer("bulan");
            $table->integer("tahun");
            $table->string("id_dinas");
            $table->string("id_kategori");
            $table->text("nama_file");
            $table->text("introtext");
            $table->datetime("created")->nullable()->default(null);
            $table->integer("created_by")->nullable()->default(null);
            $table->datetime("modified")->nullable()->default(null);
            $table->integer("modified_by")->nullable()->default(null);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengelolaan_anggaran');
    }
}
