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
        Schema::create('pr_pk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_kecamatan');
            $table->string('id_zona')->nullable();
            $table->string('prpk');
            $table->string('nama_organisasi');
            $table->string('no_sp_ipnu')->nullable();
            $table->string('masa_khidmat_ipnu')->nullable();
            $table->string('berlaku_sp_ipnu')->nullable();
            $table->string('file_sp_ipnu')->nullable();
            $table->string('ketua_ipnu')->nullable();
            $table->string('sekretaris_ipnu')->nullable();
            $table->string('masa_khidmat_ippnu')->nullable();
            $table->string('no_sp_ippnu')->nullable();
            $table->string('berlaku_sp_ippnu')->nullable();
            $table->string('file_sp_ippnu')->nullable();
            $table->string('ketua_ippnu')->nullable();
            $table->string('sekretaris_ippnu')->nullable();
            $table->string('sekretariat')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
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
        Schema::dropIfExists('pr_pk');
    }
};
