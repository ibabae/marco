<?php

namespace Tests\Feature\Shop;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;

class ProductTest extends TestCase
{
    public function test_get_products(){
        $response = $this->get('/api/admin/shop/product');

        $response->assertStatus(200);
    }

    public function test_create_product(): void
    {
        $discountStartDate = fake()->dateTimeBetween('-1 months', '+1 months');
        $discountEndDate = $discountStartDate ? \Carbon\Carbon::parse($discountStartDate->format('Y-m-d H:i:s'))->addDays(random_int(1, 30)) : null;
        $data = [
            'title' => 'product title',
            'price' => rand(150000, 700000),
            'discount_price' => 140000,
            'categories' => collect(Category::inRandomOrder()->limit(3)->get())->pluck('id')->toArray(),
            'brand_id' => Brand::factory()->create()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'sku' => fake()->unique()->bothify('??-####'),
            'status' => fake()->randomElement(['active','inactive']),

            'min_order_quantity' => rand(1,10),
            'max_order_quantity' => rand(11,100),
            'seo_title' => fake()->optional()->sentence(6),
            'seo_description' => fake()->optional()->text(160),
            'discount_start_date' => $discountStartDate->format('Y-m-d H:i:s'),
            'discount_end_date' => $discountEndDate,

        ];
        $response = $this->post('/api/admin/shop/product', $data);

        $response->assertStatus(201);
    }

    public function test_get_product(){
        $product = Product::inRandomOrder()->first();
        $response = $this->get("/api/admin/shop/product/$product->id");

        $response->assertStatus(200);
    }

    public function test_update_product(){
        $product = Product::factory()->create();
        $discountStartDate = fake()->dateTimeBetween('-1 months', '+1 months');
        $discountEndDate = $discountStartDate ? \Carbon\Carbon::parse($discountStartDate->format('Y-m-d H:i:s'))->addDays(random_int(1, 30)) : null;
        $data = [
            'title' => 'product title',
            'price' => rand(150000, 700000),
            'discount_price' => 140000,
            'categories' => collect(Category::inRandomOrder()->limit(3)->get())->pluck('id')->toArray(),
            'brand_id' => Brand::factory()->create()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'sku' => fake()->unique()->bothify('??-####'),
            'status' => fake()->randomElement(['active','inactive']),

            'min_order_quantity' => rand(1,10),
            'max_order_quantity' => rand(11,100),
            'seo_title' => fake()->optional()->sentence(6),
            'seo_description' => fake()->optional()->text(160),
            'discount_start_date' => $discountStartDate->format('Y-m-d H:i:s'),
            'discount_end_date' => $discountEndDate,

        ];

        $response = $this->put("/api/admin/shop/product/$product->id",$data);

        $response->assertStatus(200);
    }

    public function test_delete_product(){
        $product = Product::factory()->create();
        $response = $this->delete("/api/admin/shop/product/$product->id");

        $response->assertStatus(200);
    }

}
