<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToSyaratSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('syarat_surat', function (Blueprint $table) {
            $table->unsignedBigInteger('penduduksurat_id')->after('id');
            $table->foreign('penduduksurat_id')->references('id')->on('penduduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('syarat_surat', function (Blueprint $table) {
            //
        });
    }
}
