<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePesertaBantuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_bantuan', function (Blueprint $table) {
            $table->id();
            $table->string('no_kartu',100);
            $table->string('file_kartu')->nullable();
            $table->string('nik',16);
            $table->string('nama',50);
            $table->string('tempat_lahir',50);
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_bantuan');
    }
}
