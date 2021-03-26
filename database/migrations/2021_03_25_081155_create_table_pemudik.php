<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePemudik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemudik', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16)->nullable();
            $table->string('nama',100)->nullable();
            $table->string('jk',20)->nullable();
            $table->string('agama',20)->nullable();
            $table->string('tempat_lahir',50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('goldar',10)->nullable();
            $table->string('status_penduduk',100)->nullable();
            $table->string('alamat')->nullable();
            $table->integer('rt_id')->nullable();
            $table->string('asal_pemudik');
            $table->date('tgl_mudik');
            $table->string('tujuan_mudik',100);
            $table->integer('jumlah_hari');
            $table->string('no_hp',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('status_covid',100);
            $table->enum('status_pantau',['ya','tidak']);
            $table->string('keluhan_kesehatan');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('pemudik');
    }
}
