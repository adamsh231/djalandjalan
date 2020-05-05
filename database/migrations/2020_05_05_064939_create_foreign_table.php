<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partner', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
        Schema::table('join', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('partner')->onDelete('cascade');
        });
        Schema::table('comment', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('partner')->onDelete('cascade');
        });
        Schema::table('reply', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('comment')->onDelete('cascade');
        });
        Schema::table('gallery', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
        Schema::table('notification', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
        Schema::table('review', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('join_id')->references('id')->on('join')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partner', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('join', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['partner_id']);
        });
        Schema::table('comment', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['partner_id']);
        });
        Schema::table('reply', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['comment_id']);
        });
        Schema::table('gallery', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('notification', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('review', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['join_id']);
        });
    }
}
