<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToJurnalAkun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jurnal_akun', function (Blueprint $table) {
            $table->unsignedBigInteger('jurnalumum_id')->after('id');
            $table->foreign('jurnalumum_id')->references('id')->on('jurnal_umum')->onDelete('cascade');
            $table->unsignedBigInteger('daftarakun_id')->after('jurnalumum_id');
            $table->foreign('daftarakun_id')->references('id')->on('daftar_akun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurnal_akun', function (Blueprint $table) {
            //
        });
    }
}
