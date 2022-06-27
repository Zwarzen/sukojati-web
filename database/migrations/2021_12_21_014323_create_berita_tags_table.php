<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('berita_tags');
        Schema::create('berita_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('berita_id');
            $table->foreign('berita_id')->references('id')->on('beritas');
            $table->unsignedBigInteger('berita_tag_id');
            $table->foreign('berita_tag_id')->references('id')->on('berita_master_tags');
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
        Schema::dropIfExists('berita_tags');
    }
}
