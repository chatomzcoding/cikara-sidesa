<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToAnggotaKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota_kelompok', function (Blueprint $table) {
            $table->unsignedBigInteger('kelompok_id')->after('id');
            $table->foreign('kelompok_id')->references('id')->on('kelompok')->onDelete('cascade');
            $table->unsignedBigInteger('penduduk_id')->after('kelompok_id');
            $table->foreign('penduduk_id')->references('id')->on('penduduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggota_kelompok', function (Blueprint $table) {
            //
        });
    }
}
