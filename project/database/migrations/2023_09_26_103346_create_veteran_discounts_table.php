<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeteranDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veteran_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->integer('otp')->nullable();
            $table->integer('avail')->default(0);
            $table->integer('percentage')->nullable();
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veteran_discounts');
    }
}
