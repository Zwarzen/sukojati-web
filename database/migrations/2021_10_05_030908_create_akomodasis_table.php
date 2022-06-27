<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkomodasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akomodasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('img');
            $table->string('deskripsi')->nullable()->nullable;
            $table->string('singkatan')->nullable()->nullable;
            $table->string('type')->nullable()->nullable;
            $table->string('to_airport')->nullable()->nullable;
            $table->string('alamat')->nullable()->nullable;
            $table->string('telepon')->nullable()->nullable;
            $table->string('tautan')->nullable()->nullable;
            $table->unsignedBigInteger('star')->nullable()->nullable;
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
        Schema::dropIfExists('akomodasi');
    }
}
