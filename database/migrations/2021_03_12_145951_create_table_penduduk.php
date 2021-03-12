<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16);
            $table->string('nama_penduduk',50);
            $table->enum('status_ktp',['belum','ktp-el']);
            $table->string('status_rekam',50);
            $table->string('id_card',100)->nullable();
            $table->string('kk_sebelum',16)->nullable();
            $table->string('hubungan_keluarga',50)->nullable();
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('agama',50);
            $table->enum('status_penduduk', ['tetap','tidak tetap','pendatang']);
            $table->string('no_akta',50)->nullable();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->time('waktu_lahir')->nullable();
            $table->string('tempat_dilahirkan',50);
            $table->string('jenis_kelahiran',50);
            $table->integer('anak_ke');
            $table->string('penolong_kelahiran',50);
            $table->string('berat_lahir',50)->nullable();
            $table->string('panjang_lahir',50)->nullable();
            $table->string('pendidikan_kk',50);
            $table->string('pendidikan_tempuh',50);
            $table->string('pekerjaan',50);
            $table->string('status_kewarganegaraan',50);
            $table->string('nomor_paspor',50)->nullable();
            $table->date('tgl_akhirpaspor')->nullable();
            $table->string('nomor_kitas',50)->nullable();
            $table->string('nik_ayah',16);
            $table->string('nama_ayah',50);
            $table->string('nik_ibu',16);
            $table->string('nama_ibu',50);
            $table->string('lat_penduduk',20)->nullable();
            $table->string('long_penduduk',20)->nullable();
            $table->string('no_telp',20)->nullable();
            $table->string('email',100)->nullable();
            $table->text('alamat_sebelum')->nullable();
            $table->text('alamat_sekarang');
            $table->string('status_perkawinan',50);
            $table->string('no_bukunikah',50)->nullable();
            $table->date('tgl_perkawinan')->nullable();
            $table->string('akta_perceraian',50)->nullable();
            $table->date('tgl_perceraian')->nullable();
            $table->string('golongan_darah',20);
            $table->string('cacat',50);
            $table->string('sakit_menahun',50);
            $table->string('akseptor_kb',50);
            $table->string('asuransi',50);
            $table->text('poto')->nullable();
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
        Schema::dropIfExists('penduduk');
    }
}
