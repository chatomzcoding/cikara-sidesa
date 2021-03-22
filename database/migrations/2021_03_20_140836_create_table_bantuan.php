<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBantuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantuan', function (Blueprint $table) {
            $table->id();
            $table->string('sasaran',50);
            $table->string('nama_program');
            $table->text('keterangan');
            $table->string('asal_dana',50);
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->enum('status',['aktif','tidak aktif']);
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
        Schema::dropIfExists('bantuan');
    }
}
