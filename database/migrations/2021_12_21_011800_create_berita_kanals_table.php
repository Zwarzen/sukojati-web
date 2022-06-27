<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaKanalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('berita_kanals');
        Schema::create('berita_kanals', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("desc")->nullable()->default(null);
            $table->string("slug")->nullable()->default(null);
            $table->integer("hit")->default(0);
            $table->string("creatorid")->nullable()->default(null);
            $table->string("createdby")->nullable()->default(null);
            $table->string("modifiedby")->nullable()->default(null);
            $table->string("modifierid")->nullable()->default(null);
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
        Schema::dropIfExists('berita_kanals');
    }
}
