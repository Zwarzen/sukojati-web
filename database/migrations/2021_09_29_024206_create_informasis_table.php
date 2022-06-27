<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasis', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('wisata_id');
            $table->foreign('wisata_id')->references('id')->on('wisatas');
            $table->string('name');
            $table->string('lokasi');
            $table->text('akses');
            $table->string('image'); 
            $table->text('deskripsi');
            $table->string('jenis');
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
        Schema::dropIfExists('informasis');
    }
}
