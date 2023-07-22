<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prokjas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_ket');
            $table->string('ket');
            $table->string('id_kec');
            $table->string('jangka');
            $table->string('tgl_keg');
            $table->string('nama_keg');
            $table->string('target');
            $table->string('output');
            $table->string('mitra');
            $table->string('departemen');
            $table->string('status');
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
        Schema::dropIfExists('prokjas');
    }
};
