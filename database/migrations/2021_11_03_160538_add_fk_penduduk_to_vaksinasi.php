<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkPendudukToVaksinasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaksinasi', function (Blueprint $table) {
            $table->unsignedBigInteger('penduduk_id')->after('id');
            $table->foreign('penduduk_id')->references('id')->on('penduduk')->onDelete('cascade');
            $table->unsignedBigInteger('kategori_id')->after('id');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaksinasi', function (Blueprint $table) {
            //
        });
    }
}
