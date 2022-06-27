<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string("unor")->nullable()->default(null);
            $table->string("title");
            $table->string("desc");
            $table->longText("content");
            $table->longText("keyword")->nullable()->default(null);
            $table->string("slug");
            $table->string("img_thumb")->nullable()->default(null);
            $table->string("img_raw")->nullable()->default(null);
            $table->string("img_desc")->nullable()->default(null);
            $table->string("id_youtube")->nullable()->default(null);
            $table->string("url_video")->nullable()->default(null);
            $table->integer("hit")->default(0);
            $table->enum("allow_comment",['yes', 'no'])->default("no");
            $table->enum("is_berita_video",['yes', 'no'])->default("no");
            $table->timestamp("publish_date")->nullable()->default(null);
            $table->enum("published",['yes', 'no'])->default("no");
            $table->unsignedBigInteger('berita_kanal_id');
            $table->foreign('berita_kanal_id')->references('id')->on('berita_kanals');
            $table->string("publishedby")->nullable()->default(null);
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
        Schema::dropIfExists('beritas');
    }
}
