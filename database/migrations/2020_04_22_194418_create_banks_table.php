<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('bank_name_ar')->nullable();
            $table->string('bank_name_en')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banks');
    }
}
