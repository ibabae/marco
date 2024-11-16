<?php

namespace Database\Seeders\Shop;

use App\Models\CategoryLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryLevel::factory(10)->create();
    }
}
