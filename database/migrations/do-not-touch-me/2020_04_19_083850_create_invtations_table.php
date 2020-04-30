<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvtationsTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('code');

            $table->integer('sent_by_user_id')->unsigned();
            $table->integer('invited_user_id')->unsigned();
            $table->tinyInteger('valid')->default('0');
//            $table->foreign('sent_by_user_id')->references('id')->on('users');
//            $table->foreign('invited_user_id')->references('id')->on('users')->nullable();
            $table->timestamps();
        });
//        Schema::table('invitations', function (Blueprint $table) {
//            $table->foreign('sent_by_user_id')->references('id')->on('users')->onDelete('cascade');
//        });
//        Schema::table('invitations', function (Blueprint $table) {
//            $table->foreign('invited_user_id')->references('id')->on('users')->nullable()->onDelete('cascade');
//        });
    }
}
