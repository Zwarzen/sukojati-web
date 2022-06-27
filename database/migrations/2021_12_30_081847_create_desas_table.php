<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            // $table->integer("desa_kode");
            $table->string("nama_desa");
            $table->string("alamat");
            $table->string("telp");
            $table->string("kode_pos");
            $table->string("kat");
            $table->integer("no_kel");
            $table->integer("no_kec");
            $table->integer("no_kab");
            $table->integer("no_prop");
            $table->string("email");
            $table->string("website");            
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
        Schema::dropIfExists('desas');
    }
}
