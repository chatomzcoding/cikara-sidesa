<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToAnggotakeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota_keluarga', function (Blueprint $table) {
            $table->unsignedBigInteger('keluarga_id')->after('id');
            $table->foreign('keluarga_id')->references('id')->on('keluarga')->onDelete('cascade');
            $table->unsignedBigInteger('penduduk_id')->after('keluarga_id');
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
        Schema::table('anggota_keluarga', function (Blueprint $table) {
            //
        });
    }
}
