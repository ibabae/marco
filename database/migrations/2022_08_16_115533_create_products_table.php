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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('UserId');
            $table->index('UserId');
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Title');
            $table->integer('Featured')->default(0);
            $table->string('Code');
            $table->string('Material');
            $table->integer('Price');
            $table->integer('DisType')->nullable();
            $table->integer('DisAmount')->nullable();
            $table->text('Descriptions');
            $table->longText('Content')->nullable();
            $table->integer('Status')->default(1);
            $table->longText('Stock');
            $table->integer('MainCategory');
            $table->integer('SubCategory');
            $table->text('Tags')->nullable();
            $table->text('PrimaryImage');
            $table->text('SecondaryImage')->nullable();
            $table->string('UniqueId')->nullable();
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
        Schema::dropIfExists('products');
    }
};
