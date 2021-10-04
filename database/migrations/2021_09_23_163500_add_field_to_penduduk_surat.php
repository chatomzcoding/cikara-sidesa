<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToPendudukSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penduduk_surat', function (Blueprint $table) {
            $table->string('nomor_surat')->nullable();
            $table->text('keperluan')->nullable();
            $table->text('keterangan')->nullable();
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->string('atas_nama')->nullable();
            $table->string('staf_pemerintahan')->nullable();
            $table->string('menjabat')->nullable();
            $table->string('tampilkan_poto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penduduk_surat', function (Blueprint $table) {
            //
        });
    }
}
