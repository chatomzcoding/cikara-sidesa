<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToJurnalAkunpembantu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jurnal_akunpembantu', function (Blueprint $table) {
            $table->unsignedBigInteger('jurnalumum_id')->after('id');
            $table->foreign('jurnalumum_id')->references('id')->on('jurnal_umum')->onDelete('cascade');
            $table->unsignedBigInteger('daftarakunpembantu_id')->after('jurnalumum_id');
            $table->foreign('daftarakunpembantu_id')->references('id')->on('daftar_akunpembantu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurnal_akunpembantu', function (Blueprint $table) {
            //
        });
    }
}
