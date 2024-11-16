<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(SettingsSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(DefaultAdminPermissionSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(AdminPermissionSeeder::class);
        $this->call(UserPermissionSeeder::class);

        User::factory(10)->create();

    }
}
