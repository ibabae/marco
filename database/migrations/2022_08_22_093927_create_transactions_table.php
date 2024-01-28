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
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->index('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('orderId');
            $table->index('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('price');
            $table->integer('payType');
            $table->integer('gateWay');
            $table->string('authority')->nullable();
            $table->text('trackId')->nullable();
            $table->string('cardHash')->nullable();
            $table->string('cardPan')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('transactions');
    }
};
