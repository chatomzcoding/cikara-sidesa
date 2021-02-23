<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDaftarAkunpembantu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_akunpembantu', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bantu');
            $table->string('nama_akun');
            $table->string('status');
            $table->bigInteger('saldo_akunpembantu');
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
        Schema::dropIfExists('daftar_akunpembantu');
    }
}
