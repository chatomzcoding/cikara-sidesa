<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToAnggotaRumahTangga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota_rumah_tangga', function (Blueprint $table) {
            $table->unsignedBigInteger('rumahtangga_id')->after('id');
            $table->foreign('rumahtangga_id')->references('id')->on('rumah_tangga')->onDelete('cascade');
            $table->unsignedBigInteger('penduduk_id')->after('rumahtangga_id');
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
        Schema::table('anggota_rumah_tangga', function (Blueprint $table) {
            //
        });
    }
}
