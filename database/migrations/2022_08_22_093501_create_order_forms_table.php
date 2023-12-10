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
        Schema::create('order_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->index('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('orderId');
            $table->index('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('productId');
            $table->index('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('count');
            $table->string('size');
            $table->string('color');
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
        Schema::dropIfExists('order_forms');
    }
};
