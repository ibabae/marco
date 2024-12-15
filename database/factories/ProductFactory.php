<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        $discountStartDate = $this->faker->optional()->dateTimeBetween('-1 months', '+1 months');
        $discountEndDate = $discountStartDate ? Carbon::parse($discountStartDate)->addDays(random_int(1, 30)) : null;

        return [
            'title' => fake()->words(3, true),
            'description' => fake()->optional()->paragraph(),
            'price' => fake()->numberBetween(100, 10000),
            'discount_price' => fake()->optional()->numberBetween(50, 9000),
            'sku' => fake()->optional()->uuid(),
            'status' => fake()->randomElement(['active','inactive']), // 90% true
            'brand_id' => Brand::factory(),
            'category_id' => Category::factory(),
            'min_order_quantity' => fake()->optional()->numberBetween(1, 10),
            'max_order_quantity' => fake()->optional()->numberBetween(11, 100),
            'seo_title' => fake()->optional()->sentence(6),
            'seo_description' => fake()->optional()->paragraph(),
            'discount_start_date' => $discountStartDate,
            'discount_end_date' => $discountEndDate,
        ];
    }

    public function withAttributes(array $attributes = [], array $values = []): static
    {
        return $this->afterCreating(function ($product) use ($attributes, $values) {
            if (empty($attributes)) {
                $attributes = Attribute::factory()->count(3)->create();
            }

            foreach ($attributes as $index => $attribute) {
                $value = $values[$index] ?? $this->faker->word();
                $product->attributes()->attach($attribute->id, [
                    'value' => $value,
                ]);
            }
        });
    }

    public function withTags(array $tags = []): static
    {
        return $this->afterCreating(function ($product) use ($tags) {
            if (empty($tags)) {
                $tags = Tag::factory()->count(3)->create();
            }

            foreach ($tags as $tag) {
                $product->tags()->attach($tag->id);
            }
        });
    }


}
