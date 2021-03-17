<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToAnggotaSuplemen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota_suplemen', function (Blueprint $table) {
            $table->unsignedBigInteger('suplemen_id')->after('id');
            $table->foreign('suplemen_id')->references('id')->on('suplemen')->onDelete('cascade');
            $table->unsignedBigInteger('penduduk_id')->after('suplemen_id');
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
        Schema::table('anggota_suplemen', function (Blueprint $table) {
            //
        });
    }
}
