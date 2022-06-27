<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('galeri_kategoris');
        Schema::create('galeri_kategoris', function (Blueprint $table) {

            $table->id();
            $table->string("name");
            $table->string("creatorid");
            $table->string("createdby");
            $table->string("modifiedby");
            $table->string("modifierid");
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
        Schema::dropIfExists('galeri_kategoris');
    }
}
