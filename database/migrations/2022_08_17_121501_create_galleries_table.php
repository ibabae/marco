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
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->unsignedInteger('ProductId');
            $table->index('ProductId');
            $table->foreign('ProductId')->references('id')->on('pdoructs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('UserId');
            $table->index('UserId');
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('galleries');
    }
};
