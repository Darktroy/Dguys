<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiscountCodesTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_codes');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_codes', function (Blueprint $table) {
            $table->id();
            $table->string('dicount_code');
            
            $table->binary('is_active')->default('0');
            $table->binary('is_individual')->default('0');
            $table->binary('is_once')->default('0');
            
            $table->double('dicount_percentage', 4, 2)->default('0');	
            $table->double('discount_amount', 8, 2)->default('0');	

            $table->date('valid_from')->nullable();	
            $table->date('valid_to')->nullable();	
            
            $table->timestamps();
        });
    }
}
