<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->integer("kec_kode")->nullable()->default(null);
            $table->integer("kab_kode")->nullable()->default(null);
            $table->integer("prov_kode")->nullable()->default(null);
            $table->string("kec_nama")->nullable()->default(null);
            $table->string("kab_nama")->nullable()->default(null);
            $table->string("prov_nama")->nullable()->default(null);
            $table->text("alamat")->nullable()->default(null);
            $table->string("fax")->nullable()->default(null);
            $table->string("telp")->nullable()->default(null);
            $table->string("email")->nullable()->default(null);
            $table->string("website")->nullable()->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatans');
    }
}
