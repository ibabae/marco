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
                'order' => 0,
            ],
            [
                'id' => 2,
                'title' => 'فروشگاه',
                'icon' => 'icon ti-package',
                'link' => 'admin.shop.*',
                'order' => 0,
            ],
            [
                'id' => 3,
                'title' => 'عناصر',
                'icon' => 'icon ti-layers',
                'link' => 'admin.layer.*',
                'order' => 0,
            ],

            [
                'id' => 4,
                'order' => 1,
                'title' => 'تنظیمات',
                'icon' => 'icon ti-settings',
                'link' => 'admin.settings',
            ],
            [
                'id' => 5,
                'order' => 1,
                'title' => 'خروج',
                'icon' => 'icon ti-power-off',
                'link' => 'user.account.logout',
            ],

            // first
            [
                'id' => 6,
                'title' => 'فروش و مدیریت مشتری',
                'icon' => null,
                'link' => 'admin.dashboard.panel',
                'order' => 0,
            ],
            [
                'id' => 7,
                'title' => 'پشتیبانی',
                'icon' => null,
                'link' => 'admin.dashboard.support',
                'order' => 0,
            ],
            [
                'id' => 8,
                'title' => 'آمار وبسایت',
                'icon' => null,
                'link' => 'admin.dashboard.statistics',
                'order' => 0,
            ],

            // shop
            [
                'id' => 9,
                'title' => 'محصولات',
                'icon' => null,
                'link' => 'admin.shop.product',
                'order' => 0,
            ],
            [
                'id' => 10,
                'title' => 'دسته ها',
                'icon' => null,
                'link' => 'admin.shop.category',
                'order' => 0,
            ],
            [
                'id' => 11,
                'title' => 'اندازه ها',
                'icon' => null,
                'link' => 'admin.shop.size',
                'order' => 0,
            ],
            [
                'id' => 12,
                'title' => 'رنگ ها',
                'icon' => null,
                'link' => 'admin.shop.color',
                'order' => 0,
            ],

            // layers
            [
                'id' => 13,
                'title' => 'کاربران',
                'icon' => null,
                'link' => 'admin.layer.user',
                'order' => 0,
            ],
        ]);
        DB::table('menu_levels')->insertOrIgnore([
            [
                'item_id' => 6,
                'parent_id' => 1,
            ],
            [
                'item_id' => 7,
                'parent_id' => 1,
            ],
            [
                'item_id' => 8,
                'parent_id' => 1,
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
                'parent_id' => 2,
            ],
            [
                'item_id' => 12,
                'parent_id' => 2,
            ],

            [
                'item_id' => 13,
                'parent_id' => 3,
            ],
        ]);
    }
}
