<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('galeris');
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("desc");
            $table->string("slug");
            $table->string("img_thumb");
            $table->string("img_raw");
            $table->integer("hit")->default(0);
            $table->timestamp("publish_date")->nullable()->default(null);
            $table->enum("published",['yes', 'no'])->default("no");
            $table->unsignedBigInteger('galeri_kategori_id');
            $table->foreign('galeri_kategori_id')->references('id')->on('galeri_kategoris');
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
        Schema::dropIfExists('galeris');
    }
}
