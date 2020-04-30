<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivationsTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirmations');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('code');
            $table->enum('type', ['email', 'mobile']);
            $table->timestamps();
//            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
