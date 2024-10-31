<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('categories')->insert([
            [
                'title' => 'دسته اصلی',
            ]
        ]);
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
        DB::table('sliders')->insert([
            [
                'id'       =>  '1',
                'Title'    =>  'قیمت های مناسب',
                'Image'    =>  'uploads/slider/2022-10/08/main-slider-3.jpg',
                'Link'     =>  'shop',
                'Text2'    =>  'در مارکوپلاس',
                'Text3'    =>  'تخفیف های ویژه در خرید',
            ],
            [
                'id'       =>  '2',
                'Title'    =>  'بهترین کیفیت',
                'Image'    =>  'uploads/slider/2022-10/08/main-slider-2.jpg',
                'Link'     =>  'shop',
                'Text2'    =>  'محصولات متنوع',
                'Text3'    =>  'تیشرت های ارزان و با کیفیت',
            ],
            [
                'id'       =>  '3',
                'Title'    =>  'پیشنهاد ویژه',
                'Image'    =>  'uploads/slider/2022-10/08/main-slider-1.jpg',
                'Link'     =>  'shop',
                'Text2'    =>  'خرید محصولات به صورت جین',
                'Text3'    =>  'برای فروشندگان',
            ],
        ]);

        $this->call(LocationsSeeder::class);

    }
}
