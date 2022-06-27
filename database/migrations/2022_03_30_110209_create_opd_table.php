<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opd', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable()->default(null);
            $table->string('jenis_opd')->nullable()->default(null);
            $table->string('lat')->nullable()->default(null);
            $table->string('long')->nullable()->default(null);
            $table->string('alamat')->nullable()->default(null);
            $table->string('prov_id')->nullable()->default(null);
            $table->string('kab_id')->nullable()->default(null);
            $table->string('kec_id')->nullable()->default(null);
            $table->string('kel_id')->nullable()->default(null);
            $table->string('prov_nama')->nullable()->default(null);
            $table->string('kab_nama')->nullable()->default(null);
            $table->string('kec_nama')->nullable()->default(null);
            $table->string('kel_nama')->nullable()->default(null);
            $table->string('kodepos')->nullable()->default(null);
            $table->string('telp')->nullable()->default(null);
            $table->string('fax')->nullable()->default(null);
            $table->string('surel')->nullable()->default(null);
            $table->string('wallpaper')->nullable()->default(null);
            $table->string('foto_profil')->nullable()->default(null);
            $table->enum("aktif",['1', '0'])->default("1");
            $table->string('createdby')->nullable()->default(null);
            $table->string('modifiedby')->nullable()->default(null);
            $table->string('disabledby')->nullable()->default(null);
            $table->string('creatorid')->nullable()->default(null);
            $table->string('modifierid')->nullable()->default(null);
            $table->string('disablerid')->nullable()->default(null);
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
        Schema::dropIfExists('opd');
    }
}
