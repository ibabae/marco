<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_items')->insertOrIgnore([
            // main
            [
                'id' => 1,
                'title' => 'داشبورد',
                'icon' => 'icon ti-pie-chart',
                'link' => 'admin.dashboard.*',
            ],
            [
                'id' => 2,
                'title' => 'فروشگاه',
                'icon' => 'icon ti-package',
                'link' => 'admin.shop.*',
            ],
            [
                'id' => 3,
                'title' => 'عناصر',
                'icon' => 'icon ti-layers',
                'link' => 'admin.layer.*',
            ],

            // first
            [
                'id' => 4,
                'title' => 'فروش و مدیریت مشتری',
                'icon' => null,
                'link' => 'admin.dashboard.panel',
            ],
            [
                'id' => 5,
                'title' => 'پشتیبانی',
                'icon' => null,
                'link' => 'admin.dashboard.support',
            ],
            [
                'id' => 6,
                'title' => 'آمار وبسایت',
                'icon' => null,
                'link' => 'admin.dashboard.statistics',
            ],

            // shop
            [
                'id' => 7,
                'title' => 'محصولات',
                'icon' => null,
                'link' => 'admin.shop.product',
            ],
            [
                'id' => 8,
                'title' => 'دسته ها',
                'icon' => null,
                'link' => 'admin.shop.category',
            ],
            [
                'id' => 9,
                'title' => 'اندازه ها',
                'icon' => null,
                'link' => 'admin.shop.size',
            ],
            [
                'id' => 10,
                'title' => 'رنگ ها',
                'icon' => null,
                'link' => 'admin.shop.color',
            ],

            // layers
            [
                'id' => 11,
                'title' => 'کاربران',
                'icon' => null,
                'link' => 'admin.layer.user',
            ],
        ]);
        DB::table('menu_levels')->insertOrIgnore([
            [
                'item_id' => 4,
                'parent_id' => 1,
            ],
            [
                'item_id' => 5,
                'parent_id' => 1,
            ],
            [
                'item_id' => 6,
                'parent_id' => 1,
            ],
            [
                'item_id' => 7,
                'parent_id' => 2,
            ],
            [
                'item_id' => 8,
                'parent_id' => 2,
            ],
            [
                'item_id' => 9,
                'parent_id' => 2,
            ],
            [
                'item_id' => 10,
                'parent_id' => 2,
            ],

            [
                'item_id' => 11,
                'parent_id' => 3,
            ],
        ]);
    }
}
