<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('token')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
//        Schema::table('password_resets', function (Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//        });
    }
}
