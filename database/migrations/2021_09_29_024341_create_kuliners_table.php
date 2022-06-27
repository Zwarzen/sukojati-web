<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKulinersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuliners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wisata_id');
            $table->foreign('wisata_id')->references('id')->on('wisatas');
            $table->string('name');
            $table->string('lokasi');
            $table->integer('kecamatan');
            $table->string('jenis_produk'); 
            $table->text('deskripsi');
            $table->string('harga');
            $table->string('buka');
            $table->string('tutup');
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
        Schema::dropIfExists('kuliners');
    }
}
