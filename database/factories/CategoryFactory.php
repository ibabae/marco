<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'title' => fake()->words(2, true),
            'description' => fake()->sentence(),
            'parent_id' => null,
        ];
    }

    public function withChildren($depth = 3)
    {
        return $this->afterCreating(function (Category $category) use ($depth) {
            if ($depth > 1) {
                $child = Category::factory()
                    ->state(['parent_id' => $category->id])
                    ->create();
                $child->factory()->withChildren($depth - 1)->create();
            }
        });
    }
}
