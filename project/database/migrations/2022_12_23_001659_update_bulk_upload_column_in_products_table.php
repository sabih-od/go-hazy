<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBulkUploadColumnInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        size varchar(191) NULL
//        size_qty varchar(191) NULL
//        size_price varchar(191) NULL
//        color text NULL

        Schema::table('products', function (Blueprint $table) {
            $table->longText('size')->nullable()->change();
            $table->longText('size_qty')->nullable()->change();
            $table->longText('size_price')->nullable()->change();
            $table->longText('color')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('size')->nullable()->change();
            $table->string('size_qty')->nullable()->change();
            $table->string('size_price')->nullable()->change();
            $table->text('color')->nullable()->change();
        });
    }
}
