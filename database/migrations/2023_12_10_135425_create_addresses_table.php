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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->index('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('stateId');
            $table->index('stateId');
            $table->foreign('stateId')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('cityId');
            $table->index('cityId');
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->text('address');
            $table->bigInteger('zipcode')->nullable();
            $table->integer('number')->nullable();
            $table->boolean('primary')->default(false);
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
        Schema::dropIfExists('addresses');
    }
};
