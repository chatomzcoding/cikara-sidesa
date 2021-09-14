<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkForumToForumDiskusi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forum_diskusi', function (Blueprint $table) {
            $table->unsignedBigInteger('forum_id')->after('user_id');
            $table->foreign('forum_id')->references('id')->on('forum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forum_diskusi', function (Blueprint $table) {
            //
        });
    }
}
