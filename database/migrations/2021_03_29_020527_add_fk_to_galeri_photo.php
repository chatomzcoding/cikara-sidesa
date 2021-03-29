<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToGaleriPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galeri_photo', function (Blueprint $table) {
            $table->unsignedBigInteger('galeri_id')->after('id');
            $table->foreign('galeri_id')->references('id')->on('galeri')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galeri_photo', function (Blueprint $table) {
            //
        });
    }
}
