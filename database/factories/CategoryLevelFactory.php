<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryLevel>
 */
class CategoryLevelFactory extends Factory
{
    protected $model = CategoryLevel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'parent_id' => Category::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
