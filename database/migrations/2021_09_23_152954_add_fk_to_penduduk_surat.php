<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToPendudukSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penduduk_surat', function (Blueprint $table) {
            $table->unsignedBigInteger('penduduk_id')->after('id');
            $table->foreign('penduduk_id')->references('id')->on('penduduk')->onDelete('cascade');
            $table->unsignedBigInteger('formatsurat_id')->after('penduduk_id');
            $table->foreign('formatsurat_id')->references('id')->on('format_surat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penduduk_surat', function (Blueprint $table) {
            //
        });
    }
}
