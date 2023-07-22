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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pac_id');
            $table->string('tgl_surat');
            $table->enum('jns_surat', ['A','B','C']);
            $table->string('no_surat');
            $table->string('tujuan_surat');
            $table->string('tgl_isi');
            $table->string('perihal');
            $table->string('isi_surat');
            $table->string('status');
            $table->string('file');
            $table->rememberToken();
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
        Schema::dropIfExists('surat_');
    }
};
