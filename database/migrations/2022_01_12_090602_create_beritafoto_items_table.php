<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritafotoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritafoto_items', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("keyword")->nullable()->default(null);
            $table->string("slug");
            $table->string("img_thumb")->nullable()->default(null);
            $table->string("img_raw")->nullable()->default(null);
            $table->longText("img_desc")->nullable()->default(null);
            // $table->longText("img_desc")->nullable()->default(null);
            $table->enum("is_utama",['yes', 'no'])->default("no");
            $table->integer("urutan")->default(0);
            $table->unsignedBigInteger('beritafotos_id');
            $table->foreign('beritafotos_id')->references('id')->on('beritafotos');
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
        Schema::dropIfExists('beritafoto_items');
    }
}
