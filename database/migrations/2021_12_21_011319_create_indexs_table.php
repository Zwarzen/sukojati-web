<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indexs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("desc");
            $table->string("url");
            $table->string("img_url");
            $table->integer("hit");
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
        Schema::dropIfExists('indexs');
    }
}
