<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekomendasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekomendasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wisata_id');
            $table->foreign('wisata_id')->references('id')->on('wisatas');
            $table->string('name');
            $table->string('lokasi');
            $table->string('telephon');
            $table->string('image');
            $table->text('deskripsi');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('rekomendasis');
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
        Schema::dropIfExists('rekomendasis');
    }
}
