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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('settings')->insert(
            array(
                [
                    'id'=>'1',
                    'name'=>'عنوان وبسایت',
                    'code'=>'title',
                    'value'=>'مارکوپلاس'
                ],
                [
                    'id'=>'2',
                    'name'=>'توضیحات',
                    'code'=>'descriptions',
                    'value'=>'فروش و پخش پوشاک'
                ],
                [
                    'id'=>'3',
                    'name'=>'واحد ارزی',
                    'code'=>'unit',
                    'value'=>'1'
                ],
                [
                    'id'=>'4',
                    'name'=>'آدرس',
                    'code'=>'address',
                    'value'=>'لطفا مقدار آدرس را از تنظیمات مدیریت تغییر دهید'
                ],
                [
                    'id'=>'5',
                    'name'=>'تلفن',
                    'code'=>'phone',
                    'value'=>'09123456789'
                ],
                [
                    'id'=>'6',
                    'name'=>'اینستاگرام',
                    'code'=>'instagram',
                    'value'=>'marco.co'
                ],
                [
                    'id'=>'7',
                    'name'=>'شماره کارت',
                    'code'=>'cart',
                    'value'=>'6037-6037-6037-6037'
                ],
                [
                    'id'=>'8',
                    'name'=>'صاحب شماره کارت',
                    'code'=>'cartname',
                    'value'=>'محمد محمدی'
                ],
                [
                    'id'=>'9',
                    'name'=>'لوگو',
                    'code'=>'logo',
                    'value'=>''
                ],
                [
                    'id'=>'10',
                    'name'=>'مالیات',
                    'code'=>'tax',
                    'value'=>'9'
                ],
                [
                    'id'=>'11',
                    'name'=>'سود',
                    'code'=>'profit',
                    'value'=>'20'
                ],

            )
        );
        DB::table('sliders')->insert(
            array(
                [
                    'id'       =>  '1',
                    'Title'    =>  'قیمت های مناسب',
                    'Image'    =>  'upload/slider/2022-10/08/1665214000-slider-3.png',
                    'Link'     =>  'shop',
                    'Text2'    =>  'در مارکوپلاس',
                    'Text3'    =>  'تخفیف های ویژه در خرید',
                ],
                [
                    'id'       =>  '2',
                    'Title'    =>  'بهترین کیفیت',
                    'Image'    =>  'upload/slider/2022-10/08/1665214054-slider-2.png',
                    'Link'     =>  'shop',
                    'Text2'    =>  'محصولات متنوع',
                    'Text3'    =>  'تیشرت های ارزان و با کیفیت',
                ],
                [
                    'id'       =>  '3',
                    'Title'    =>  'پیشنهاد ویژه',
                    'Image'    =>  'upload/slider/2022-10/08/1665214114-slider-1.png',
                    'Link'     =>  'shop',
                    'Text2'    =>  'خرید محصولات به صورت جین',
                    'Text3'    =>  'برای فروشندگان',
                ],
            )
        );
        DB::table('states')->insert(
            array(
                [
                    'id' => '3916',
                    'name' => 'Markazi Province',
                    'name_fa' => 'مرکزی',
                ],
                [
                    'id' => '3917',
                    'name' => 'Khuzestan Province',
                    'name_fa' => 'خوزستان',
                ],
                [
                    'id' => '3918',
                    'name' => 'Ilam Province',
                    'name_fa' => 'ایلام',
                ],
                [
                    'id' => '3919',
                    'name' => 'Kermanshah Province',
                    'name_fa' => 'کرمانشاه',
                ],
                [
                    'id' => '3920',
                    'name' => 'Gilan Province',
                    'name_fa' => 'گیلان',
                ],
                [
                    'id' => '3921',
                    'name' => 'Chaharmahal and Bakhtiari Province',
                    'name_fa' => 'چهارمحال بختیاری',
                ],
                [
                    'id' => '3922',
                    'name' => 'Qom Province',
                    'name_fa' => 'قم',
                ],
                [
                    'id' => '3923',
                    'name' => 'Isfahan Province',
                    'name_fa' => 'اصفحان',
                ],
                [
                    'id' => '3924',
                    'name' => 'West Azarbaijan Province',
                    'name_fa' => 'آذربایجان غربی',
                ],
                [
                    'id' => '3925',
                    'name' => 'Zanjan Province',
                    'name_fa' => 'زنجان',
                ],
                [
                    'id' => '3926',
                    'name' => 'Kohgiluyeh and Boyer-Ahmad Province',
                    'name_fa' => 'کهگیلویه و بویراحمد',
                ],
                [
                    'id' => '3927',
                    'name' => 'Razavi Khorasan Province',
                    'name_fa' => 'خراسان رضوی',
                ],
                [
                    'id' => '3928',
                    'name' => 'Lorestan Province',
                    'name_fa' => 'لرستان',
                ],
                [
                    'id' => '3929',
                    'name' => 'Alborz Province',
                    'name_fa' => 'البرز',
                ],
                [
                    'id' => '3930',
                    'name' => 'South Khorasan Province',
                    'name_fa' => 'خراسان جنوبی',
                ],
                [
                    'id' => '3931',
                    'name' => 'Sistan and Baluchestan',
                    'name_fa' => 'سیستان و بلوچستان',
                ],
                [
                    'id' => '3932',
                    'name' => 'Bushehr Province',
                    'name_fa' => 'بوشهر',
                ],
                [
                    'id' => '3933',
                    'name' => 'Golestan Province',
                    'name_fa' => 'گلستان',
                ],
                [
                    'id' => '3934',
                    'name' => 'Ardabil Province',
                    'name_fa' => 'اردبیل',
                ],
                [
                    'id' => '3935',
                    'name' => 'Kurdistan Province',
                    'name_fa' => 'کردستان',
                ],
                [
                    'id' => '3936',
                    'name' => 'Yazd Province',
                    'name_fa' => 'یزد',
                ],
                [
                    'id' => '3937',
                    'name' => 'Hormozgan Province',
                    'name_fa' => 'هرمزگان',
                ],
                [
                    'id' => '3938',
                    'name' => 'Mazandaran Province',
                    'name_fa' => 'مازندران',
                ],
                [
                    'id' => '3939',
                    'name' => 'Fars Province',
                    'name_fa' => 'فارس',
                ],
                [
                    'id' => '3940',
                    'name' => 'Semnan Province',
                    'name_fa' => 'سمنان',
                ],
                [
                    'id' => '3941',
                    'name' => 'Qazvin Province',
                    'name_fa' => 'قزوین',
                ],
                [
                    'id' => '3942',
                    'name' => 'North Khorasan Province',
                    'name_fa' => 'خراسان شمالی',
                ],
                [
                    'id' => '3943',
                    'name' => 'Kerman Province',
                    'name_fa' => 'کرمان',
                ],
                [
                    'id' => '3944',
                    'name' => 'East Azerbaijan Province',
                    'name_fa' => 'آذرباییجان شرقی',
                ],
                [
                    'id' => '3945',
                    'name' => 'Tehran Province',
                    'name_fa' => 'تهران',
                ],
            )
        );

    }
}
