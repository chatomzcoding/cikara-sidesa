<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToRw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rw', function (Blueprint $table) {
            $table->unsignedBigInteger('dusun_id')->after('id');
            $table->foreign('dusun_id')->references('id')->on('dusun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rw', function (Blueprint $table) {
            //
        });
    }
}
