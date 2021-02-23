<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDataPokok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pokok', function (Blueprint $table) {
            $table->id();
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('nama_bumdes');
            $table->string('penasehat')->nullable();
            $table->string('direktur')->nullable();
            $table->string('manajer_keuangan')->nullable();
            $table->string('manajer_administrasi')->nullable();
            $table->string('manajer_unit')->nullable();
            $table->string('staf')->nullable();
            $table->string('ketua_pengawas')->nullable();
            $table->date('berdiri_tanggal')->nullable();
            $table->string('dasar_hukum')->nullable();
            $table->text('logo');
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
        Schema::dropIfExists('data_pokok');
    }
}
