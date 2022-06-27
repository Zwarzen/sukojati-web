<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skpds', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable()->default(null);
            $table->text("alamat")->nullable()->default(null);
            $table->string("telp")->nullable()->default(null);
            $table->string("fax")->nullable()->default(null);
            $table->enum('kode_jenis', ['1', '2']);
            $table->string("jenis")->nullable()->default(null);
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
        Schema::dropIfExists('skpds');
    }
}
