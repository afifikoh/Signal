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
        Schema::create('pac', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_kec');
            $table->string('nama_organisasi');
            $table->string('masa_khidmat')->nullable();
            $table->string('no_sp')->nullable();
            $table->string('berlaku_sp')->nullable();
            $table->string('file_sp')->nullable();
            $table->string('ketua')->nullable();
            $table->string('sekretaris')->nullable();
            $table->string('ttd_ketua')->nullable();
            $table->string('ttd_sekretaris')->nullable();
            $table->string('sekretariat')->nullable();
            $table->string('cap_organisasi')->nullable();
            $table->string('kop_surat')->nullable();
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
        Schema::dropIfExists('pac');
    }
};
