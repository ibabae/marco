<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingsSeeder::class,
            LocationsSeeder::class,
            MenuSeeder::class,
            DefaultAdminPermissionSeeder::class,
            ShopSeeder::class,
            AdminPermissionSeeder::class,
            UserPermissionSeeder::class,
        ]);
        User::factory(10)->create();
        Brand::factory(10)->create();
        Attribute::factory(10)->create();
        Product::factory(10)->withAttributes()->withTags()->create();

    }
}
