<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelompok', function (Blueprint $table) {
            $table->unsignedBigInteger('kategorikelompok_id')->after('id');
            $table->foreign('kategorikelompok_id')->references('id')->on('kategori_kelompok')->onDelete('cascade');
            $table->unsignedBigInteger('penduduk_id')->after('kategorikelompok_id');
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
        Schema::table('kelompok', function (Blueprint $table) {
            //
        });
    }
}
