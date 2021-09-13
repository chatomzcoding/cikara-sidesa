<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToPotensiSub extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('potensi_sub', function (Blueprint $table) {
            $table->unsignedBigInteger('potensi_id')->after('id');
            $table->foreign('potensi_id')->references('id')->on('potensi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('potensi_sub', function (Blueprint $table) {
            //
        });
    }
}
