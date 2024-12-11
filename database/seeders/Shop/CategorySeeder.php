<?php

namespace Database\Seeders\Shop;

use App\Models\Category;
use App\Models\CategoryLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(5)
            ->withChildren(3)
            ->create();
    }
}
