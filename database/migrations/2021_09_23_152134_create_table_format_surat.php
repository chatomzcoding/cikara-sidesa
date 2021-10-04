<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFormatSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_surat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            $table->integer('nilai_masaberlaku');
            $table->string('status_masaberlaku');
            $table->enum('layanan_mandiri',['ya','tidak']);
            $table->text('file_surat');
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
        Schema::dropIfExists('format_surat');
    }
}
