<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'title' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(),
            'parent_id' => null,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Category $category) {
            $rootItems = Category::factory(3)->create([
                'parent_id' => $category->id,
            ]);
            $rootItems->each(function ($rootItem) {
                $firstChildItems = Category::factory(3)->create([
                    'parent_id' => $rootItem->id,
                ]);
                $firstChildItems->each(function ($firstChildItem) {
                    $secondChildItems = Category::factory(3)->create([
                        'parent_id' => $firstChildItem->id,
                    ]);
                    $secondChildItems->each(function ($secondChildItem) {
                        $thirdChildItems = Category::factory(3)->create([
                            'parent_id' => $secondChildItem->id,
                        ]);
                        $thirdChildItems->each(function ($thirdChildItem) {
                            Category::factory(3)->create([
                                'parent_id' => $thirdChildItem->id,
                            ]);
                        });

                    });

                });
            });
        });
    }
}
