<?php

namespace Database\Seeders;

use Database\Seeders\Shop\CategoryLevelSeeder;
use Database\Seeders\Shop\CategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(CategoryLevelSeeder::class);
    }
}
