<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('productId');
            $table->index('productId');
            $table->foreign('productId')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('colorId');
            $table->index('colorId');
            $table->foreign('colorId')->references('id')->on('colors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('sizeId');
            $table->index('sizeId');
            $table->foreign('sizeId')->references('id')->on('sizes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_items');
    }
};
