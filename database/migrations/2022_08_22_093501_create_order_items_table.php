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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderId');
            $table->index('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('productId');
            $table->index('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('count');
            $table->unsignedBigInteger('colorId');
            $table->index('colorId');
            $table->foreign('colorId')->references('id')->on('colors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('sizeId');
            $table->index('sizeId');
            $table->foreign('sizeId')->references('id')->on('sizes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('price');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('order_items');
    }
};
