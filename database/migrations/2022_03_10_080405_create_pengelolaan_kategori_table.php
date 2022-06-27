<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengelolaanKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengelolaan_kategori', function (Blueprint $table) {
            $table->id();
            $table->string("id_kategori");
            $table->string("kategori");
            $table->string("sub_kat_a")->nullable()->default(null);
            $table->string("sub_kat_a_b")->nullable()->default(null);
            $table->string("sub_kat_a_b_c")->nullable()->default(null);
            $table->string("sub_kat_a_b_c_d")->nullable()->default(null);
            $table->string("status");
            $table->string("bgcolor")->nullable()->default(null);
            $table->string("icon")->nullable()->default(null);
            $table->string("link")->nullable()->default(null);
            $table->decimal("ACTIVE")->nullable()->default(null);
            $table->timestamps();
            $table->integer("created_by")->nullable()->default(null);
            $table->integer("updated_by")->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down()
    {
        Schema::dropIfExists('pengelolaan_kategori');
    }
}
