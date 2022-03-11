<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTanah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanah', function (Blueprint $table) {
            $table->id();
            $table->string('blok')->nullable();
            $table->string('nop',100);
            $table->string('namawp');
            $table->string('alamatwp');
            $table->string('alamatop');
            $table->string('kode_znt');
            $table->string('pbb_bumi')->nullable();
            $table->string('pbb_bangunan')->nullable();
            $table->string('nonpbb_bumi')->nullable();
            $table->string('nonpbb_bangunan')->nullable();
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
        Schema::dropIfExists('tanah');
    }
}
