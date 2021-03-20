<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInventaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode',50);
            $table->string('nama_barang',100);
            $table->string('asal_usul',50);
            $table->string('harga',20);
            $table->text('keterangan');
            $table->string('kode_barang',50)->nullable();
            $table->string('nomor_register',50)->nullable();
            $table->string('luas_tanah',20)->nullable();
            $table->year('tahun_pengadaan')->nullable();
            $table->text('lokasi')->nullable();
            $table->string('hak_tanah',20)->nullable();
            $table->string('penggunaan_barang',50)->nullable();
            $table->date('tanggal_sertifikat')->nullable();
            $table->string('no_sertifikat',50)->nullable();
            $table->string('penggunaan',50)->nullable();
            $table->string('merk',50)->nullable();
            $table->string('ukuran',20)->nullable();
            $table->string('bahan')->nullable();
            $table->string('nomor_pabrik',50)->nullable();
            $table->string('nomor_rangka',50)->nullable();
            $table->string('nomor_mesin',50)->nullable();
            $table->string('nomor_polisi',50)->nullable();
            $table->string('bpkb',100)->nullable();
            $table->string('kondisi_bangunan',50)->nullable();
            $table->string('bangunan_bertingkat',50)->nullable();
            $table->string('kontruksi_beton',20)->nullable();
            $table->string('luas_bangunan',20)->nullable();
            $table->string('nomor_bangunan',50)->nullable();
            $table->date('tgl_dok_bangunan')->nullable();
            $table->string('status_tanah',100)->nullable();
            $table->string('nomor_kode_tanah',50)->nullable();
            $table->text('kontruksi')->nullable();
            $table->string('panjang',20)->nullable();
            $table->string('lebar',20)->nullable();
            $table->string('luas',20)->nullable();
            $table->string('no_kepemilikan',100)->nullable();
            $table->date('tgl_dok_kepemilikan')->nullable();
            $table->string('jenis_aset',20)->nullable();
            $table->string('jumlah',20)->nullable();
            $table->string('fisik_bangunan',20)->nullable();
            $table->date('tgl_mulai')->nullable();
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
        Schema::dropIfExists('inventaris');
    }
}
