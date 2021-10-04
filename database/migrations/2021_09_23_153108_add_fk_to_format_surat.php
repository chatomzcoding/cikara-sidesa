<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToFormatSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('format_surat', function (Blueprint $table) {
            $table->unsignedBigInteger('klasifikasisurat_id')->after('id');
            $table->foreign('klasifikasisurat_id')->references('id')->on('klasifikasi_surat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('format_surat', function (Blueprint $table) {
            //
        });
    }
}
