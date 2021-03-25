<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToPesertaBantuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peserta_bantuan', function (Blueprint $table) {
            $table->unsignedBigInteger('bantuan_id')->after('id');
            $table->foreign('bantuan_id')->references('id')->on('bantuan')->onDelete('cascade');
            $table->unsignedBigInteger('penduduk_id')->after('bantuan_id');
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
        Schema::table('peserta_bantuan', function (Blueprint $table) {
            //
        });
    }
}
