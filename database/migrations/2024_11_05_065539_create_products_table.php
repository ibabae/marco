<?php

use App\Models\Brand;
use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->string('sku')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreignIdFor(Brand::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('min_order_quantity')->nullable();
            $table->integer('max_order_quantity')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();;
            $table->date('discount_start_date')->nullable();
            $table->date('discount_end_date')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
