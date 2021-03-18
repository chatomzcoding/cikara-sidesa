<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStaf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staf', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai',100);
            $table->string('nik',16);
            $table->string('nipd',20)->nullable();
            $table->string('nip',20)->nullable();
            $table->string('tempat_lahir',100);
            $table->date('tgl_lahir');
            $table->string('jk',20);
            $table->string('pendidikan',100);
            $table->string('agama',100);
            $table->string('golongan',100);
            $table->string('nosk_pengangkatan',100)->nullable();
            $table->date('tglsk_pengangkatan')->nullable();
            $table->string('nosk_pemberhentian',100)->nullable();
            $table->date('tglsk_pemberhentian')->nullable();
            $table->string('masa_jabatan',100);
            $table->string('jabatan',100);
            $table->enum('status_pegawai',['aktif','tidak aktif']);
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
        Schema::dropIfExists('staf');
    }
}
