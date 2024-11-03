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
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->index('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title')->index();
            $table->integer('featured')->default(0);
            $table->string('code')->nullable();
            $table->string('material');
            $table->integer('price');
            $table->integer('disPrice')->nullable();
            $table->text('excerpt');
            $table->longText('content')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('categoryId');
            $table->index('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('tags')->nullable();
            $table->text('primaryImage')->nullable();
            $table->text('secondaryImage')->nullable();
            $table->string('uniqueId')->nullable();
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
