<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unor', function (Blueprint $table) {
            $table->id();
            $table->string("kd_unor");
            $table->string("nm_unor")->nullable()->default(null);
            $table->string("al_unor")->nullable()->default(null);
            $table->string("NIP")->nullable()->default(null);
            $table->integer("jumlah")->nullable()->default(null);
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
        Schema::dropIfExists('unor');
    }
}
