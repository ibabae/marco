<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('productId');
            $table->index('productId');
            $table->foreign('productId')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('categoryId');
            $table->index('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
