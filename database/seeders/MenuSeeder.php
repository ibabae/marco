<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            // main
            [
                'id' => Str::uuid()->toString(),
                'title' => 'داشبورد',
                'icon' => 'icon ti-pie-chart',
                'link' => 'admin.dashboard.*',
                'order' => 0,
                'parent_id' => null
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'فروشگاه',
                'icon' => 'icon ti-package',
                'link' => 'admin.shop.*',
                'order' => 0,
                'parent_id' => null
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'عناصر',
                'icon' => 'icon ti-layers',
                'link' => 'admin.layer.*',
                'order' => 0,
                'parent_id' => null
            ],

            [
                'id' => Str::uuid()->toString(),
                'order' => 1,
                'title' => 'تنظیمات',
                'icon' => 'icon ti-settings',
                'link' => 'admin.settings',
                'parent_id' => null
            ],
            [
                'id' => Str::uuid()->toString(),
                'order' => 1,
                'title' => 'خروج',
                'icon' => 'icon ti-power-off',
                'link' => 'user.account.logout',
                'parent_id' => null
            ]
        ];

        $dashboardId = $menuItems[0]['id']; // UUID داشبورد
        $shopId = $menuItems[1]['id'];      // UUID فروشگاه
        $layerId = $menuItems[2]['id'];     // UUID عناصر

        $subMenuItems = [
            // first
            [
                'id' => 6,
                'title' => 'فروش و مدیریت مشتری',
                'icon' => null,
                'link' => 'admin.dashboard.panel',
                'order' => 0,
                'parent_id' => $dashboardId
            ],
            [
                'id' => 7,
                'title' => 'پشتیبانی',
                'icon' => null,
                'link' => 'admin.dashboard.support',
                'order' => 0,
                'parent_id' => $dashboardId
            ],
            [
                'id' => 8,
                'title' => 'آمار وبسایت',
                'icon' => null,
                'link' => 'admin.dashboard.statistics',
                'order' => 0,
                'parent_id' => $dashboardId
            ],

            // shop
            [
                'id' => 9,
                'title' => 'محصولات',
                'icon' => null,
                'link' => 'admin.shop.product',
                'order' => 0,
                'parent_id' => $shopId
            ],
            [
                'id' => 10,
                'title' => 'دسته ها',
                'icon' => null,
                'link' => 'admin.shop.category',
                'order' => 0,
                'parent_id' => $shopId
            ],
            [
                'id' => 11,
                'title' => 'اندازه ها',
                'icon' => null,
                'link' => 'admin.shop.size',
                'order' => 0,
                'parent_id' => $shopId
            ],
            [
                'id' => 12,
                'title' => 'رنگ ها',
                'icon' => null,
                'link' => 'admin.shop.color',
                'order' => 0,
                'parent_id' => $shopId
            ],

            // layers
            [
                'id' => 13,
                'title' => 'کاربران',
                'icon' => null,
                'link' => 'admin.layer.user',
                'order' => 0,
                'parent_id' => $layerId
            ],
        ];
        DB::table('menu_items')->insertOrIgnore(array_merge($menuItems, $subMenuItems));
    }
}
