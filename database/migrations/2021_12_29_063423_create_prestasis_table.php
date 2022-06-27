<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string("tahun")->nullable()->default(null);
            $table->string("bidang")->nullable()->default(null);
            $table->text("jenis")->nullable()->default(null);
            $table->string("peringkat")->nullable()->default(null);
            $table->string("oleh")->nullable()->default(null);
            $table->string("penyelenggara")->nullable()->default(null);
            $table->string("tingkat")->nullable()->default(null);
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
        Schema::dropIfExists('prestasis');
    }
}
