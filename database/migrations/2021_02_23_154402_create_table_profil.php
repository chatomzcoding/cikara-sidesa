<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('kode_desa',100);
            $table->string('kode_pos',10);
            $table->string('kepala_desa');
            $table->string('nip_kepaladesa',16)->nullable();
            $table->string('alamat');
            $table->string('email')->nullable();
            $table->string('telepon',20);
            $table->string('website')->nullable();
            $table->string('nama_kecamatan');
            $table->string('kode_kecamatan');
            $table->string('nama_camat');
            $table->string('nip_camat',16)->nullable();
            $table->string('nama_kabupaten');
            $table->string('kode_kabupaten',20);
            $table->string('provinsi',50);
            $table->string('kode_provinsi',20);
            $table->string('lambang_desa');
            $table->string('kantor_desa');
            $table->string('titik_lat');
            $table->string('titik_lang');
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
        Schema::dropIfExists('profil');
    }
}
