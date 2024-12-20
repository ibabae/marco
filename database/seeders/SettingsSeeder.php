<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'code' => 'title',
                'value' => 'مارکوشاپ'
            ],
            [
                'code' => 'descriptions',
                'value' => 'فروش و پخش پوشاک'
            ],
            [
                'code' => 'unit',
                'value' => '1'
            ],
            [
                'code' => 'address',
                'value' => 'لطفا مقدار آدرس را از تنظیمات مدیریت تغییر دهید'
            ],
            [
                'code' => 'phone',
                'value' => '09123456789'
            ],
            [
                'code' => 'instagram',
                'value' => 'marco.co'
            ],
            [
                'code' => 'cart',
                'value' => '6037-6037-6037-6037'
            ],
            [
                'code' => 'cartname',
                'value' => 'محمد محمدی'
            ],
            [
                'code' => 'logo',
                'value' => ''
            ],
            [
                'code' => 'tax',
                'value' => '9'
            ],
            [
                'code' => 'profit',
                'value' => '20'
            ],
            [
                'code' => 'smsretry',
                'value' => '60'
            ],
        ]);

    }
}
