<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkRwIdToPenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penduduk', function (Blueprint $table) {
            $table->unsignedBigInteger('rw_id')->after('id');
            $table->foreign('rw_id')->references('id')->on('rw')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penduduk', function (Blueprint $table) {
            //
        });
    }
}
