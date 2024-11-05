<?php

use App\Models\Category;
use App\Models\CategoryLevel;
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
        Schema::create('category_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CategoryLevel::class, 'parent_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(CategoryLevel::class, 'category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_levels');
    }
};
