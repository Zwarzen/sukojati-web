<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpdUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opd_users', function (Blueprint $table) {
            $table->id();
            $table->string('opd_unor')->nullable()->default(null);
            $table->integer('user_id')->nullable()->default(null);
            $table->dateTime('tgl_register')->nullable()->default(null);
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
        Schema::dropIfExists('opd_users');
    }
}
