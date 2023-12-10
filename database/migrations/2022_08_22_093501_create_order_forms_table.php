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
            $table->unsignedInteger('UserId');
            $table->index('UserId');
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('OrderId');
            $table->index('OrderId');
            $table->foreign('OrderId')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('ProductId');
            $table->index('ProductId');
            $table->foreign('ProductId')->references('id')->on('pdoructs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('Count');
            $table->string('Size');
            $table->string('Color');
            $table->integer('Price');
            $table->integer('Status')->default(1);
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
