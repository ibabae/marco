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
        DB::table('settings')->insert([
            [
                'code' => 'title',
                'value' => 'مارکوپلاس'
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
        ]);
        DB::table('sliders')->insert([
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
        ]);
        DB::table('states')->insertOrIgnore([
            [
                'name' => 'مرکزی',
            ],
            [
                'name' => 'خوزستان',
            ],
            [
                'name' => 'ایلام',
            ],
            [
                'name' => 'کرمانشاه',
            ],
            [
                'name' => 'گیلان',
            ],
            [
                'name' => 'چهارمحال بختیاری',
            ],
            [
                'name' => 'قم',
            ],
            [
                'name' => 'اصفحان',
            ],
            [
                'name' => 'آذربایجان غربی',
            ],
            [
                'name' => 'زنجان',
            ],
            [
                'name' => 'کهگیلویه و بویراحمد',
            ],
            [
                'name' => 'خراسان رضوی',
            ],
            [
                'name' => 'لرستان',
            ],
            [
                'name' => 'البرز',
            ],
            [
                'name' => 'خراسان جنوبی',
            ],
            [
                'name' => 'سیستان و بلوچستان',
            ],
            [
                'name' => 'بوشهر',
            ],
            [
                'name' => 'گلستان',
            ],
            [
                'name' => 'اردبیل',
            ],
            [
                'name' => 'کردستان',
            ],
            [
                'name' => 'یزد',
            ],
            [
                'name' => 'هرمزگان',
            ],
            [
                'name' => 'مازندران',
            ],
            [
                'name' => 'فارس',
            ],
            [
                'name' => 'سمنان',
            ],
            [
                'name' => 'قزوین',
            ],
            [
                'name' => 'خراسان شمالی',
            ],
            [
                'name' => 'کرمان',
            ],
            [
                'name' => 'آذرباییجان شرقی',
            ],
            [
                'name' => 'تهران',
            ]
        ]);
        DB::table('cities')->insertOrIgnore([
            [
                'name' => 'آبادان',
                'stateId' => 2,
            ],
            [
                'name' => 'ابهر',
                'stateId' => 10,
            ],
            [
                'name' => 'ابریشم',
                'stateId' => 8,
            ],
            [
                'name' => 'آقاجاری',
                'stateId' => 2,
            ],
            [
                'name' => 'اهر',
                'stateId' => 29,
            ],
            [
                'name' => 'اهرم',
                'stateId' => 17,
            ],
            [
                'name' => 'اهواز',
                'stateId' => 2,
            ],
            [
                'name' => 'اکبرآباد',
                'stateId' => 24,
            ],
            [
                'name' => 'البرز',
                'stateId' => 26,
            ],
            [
                'name' => 'الشتر',
                'stateId' => 13,
            ],
            [
                'name' => 'الوند',
                'stateId' => 26,
            ],
            [
                'name' => 'الوند',
                'stateId' => 10,
            ],
            [
                'name' => 'اردبیل',
                'stateId' => 19,
            ],
            [
                'name' => 'اردکان',
                'stateId' => 21,
            ],
            [
                'name' => 'اردستان',
                'stateId' => 8,
            ],
            [
                'name' => 'اراک',
                'stateId' => 1,
            ],
            [
                'name' => 'اوج',
                'stateId' => 26,
            ],
            [
                'name' => 'ازنا',
                'stateId' => 13,
            ],
            [
                'name' => 'بدره',
                'stateId' => 3,
            ],
            [
                'name' => 'بم',
                'stateId' => 28,
            ],
            [
                'name' => 'بندرعباس',
                'stateId' => 22,
            ],
            [
                'name' => 'بندرلنگه',
                'stateId' => 22,
            ],
            [
                'name' => 'بندرانزلی',
                'stateId' => 5,
            ],
            [
                'name' => 'بندرگناوه',
                'stateId' => 17,
            ],
            [
                'name' => 'بردسکن',
                'stateId' => 12,
            ],
            [
                'name' => 'بردسیر',
                'stateId' => 28,
            ],
            [
                'name' => 'بستک',
                'stateId' => 22,
            ],
            [
                'name' => 'بهبهان',
                'stateId' => 2,
            ],
            [
                'name' => 'بهشهر',
                'stateId' => 23,
            ],
            [
                'name' => 'بن',
                'stateId' => 6,
            ],
            [
                'name' => 'بجنورد',
                'stateId' => 27,
            ],
            [
                'name' => 'بناب',
                'stateId' => 29,
            ],
            [
                'name' => 'برازجان',
                'stateId' => 17,
            ],
            [
                'name' => 'بروجن',
                'stateId' => 6,
            ],
            [
                'name' => 'بروجرد',
                'stateId' => 13,
            ],
            [
                'name' => 'بشرویه',
                'stateId' => 15,
            ],
            [
                'name' => 'بوئین و میاندشت',
                'stateId' => 8,
            ],
            [
                'name' => 'بوشهر',
                'stateId' => 17,
            ],
            [
                'name' => 'بابل',
                'stateId' => 23,
            ],
            [
                'name' => 'بابلسر',
                'stateId' => 23,
            ],
            [
                'name' => 'بافق',
                'stateId' => 21,
            ],
            [
                'name' => 'بافت',
                'stateId' => 28,
            ],
            [
                'name' => 'باغ ملک',
                'stateId' => 2,
            ],
            [
                'name' => 'بانه',
                'stateId' => 20,
            ],
            [
                'name' => 'بیجار',
                'stateId' => 20,
            ],
            [
                'name' => 'بیله سوار',
                'stateId' => 19,
            ],
            [
                'name' => 'بیرجند',
                'stateId' => 15,
            ],
            [
                'name' => 'بوکان',
                'stateId' => 9,
            ],
            [
                'name' => 'چابهار',
                'stateId' => 16,
            ],
            [
                'name' => 'چرداول',
                'stateId' => 3,
            ],
            [
                'name' => 'چلگرد',
                'stateId' => 6,
            ],
            [
                'name' => 'چناران',
                'stateId' => 12,
            ],
            [
                'name' => 'چادگان',
                'stateId' => 8,
            ],
            [
                'name' => 'چالوس',
                'stateId' => 23,
            ],
            [
                'name' => 'چایپاره',
                'stateId' => 9,
            ],
            [
                'name' => 'دماوند',
                'stateId' => 30,
            ],
            [
                'name' => 'درگز',
                'stateId' => 12,
            ],
            [
                'name' => 'دره شهر',
                'stateId' => 3,
            ],
            [
                'name' => 'ده دشت',
                'stateId' => 11,
            ],
            [
                'name' => 'دهلران',
                'stateId' => 3,
            ],
            [
                'name' => 'دهاقان',
                'stateId' => 8,
            ],
            [
                'name' => 'دلفان',
                'stateId' => 13,
            ],
            [
                'name' => 'دلیجان',
                'stateId' => 1,
            ],
            [
                'name' => 'دیلم',
                'stateId' => 17,
            ],
            [
                'name' => 'گچساران',
                'stateId' => 11,
            ],
            [
                'name' => 'درچه',
                'stateId' => 8,
            ],
            [
                'name' => 'دولت آباد',
                'stateId' => 8,
            ],
            [
                'name' => 'دامغان',
                'stateId' => 25,
            ],
            [
                'name' => 'داراب',
                'stateId' => 24,
            ],
            [
                'name' => 'داران',
                'stateId' => 8,
            ],
            [
                'name' => 'داورزن',
                'stateId' => 12,
            ],
            [
                'name' => 'اقبالیه',
                'stateId' => 30,
            ],
            [
                'name' => 'اسفراین',
                'stateId' => 27,
            ],
            [
                'name' => 'اسلام شهر',
                'stateId' => 30,
            ],
            [
                'name' => 'فلاورجان',
                'stateId' => 8,
            ],
            [
                'name' => 'فنوج',
                'stateId' => 16,
            ],
            [
                'name' => 'فردیس',
                'stateId' => 14,
            ],
            [
                'name' => 'فریدون شهر',
                'stateId' => 8,
            ],
            [
                'name' => 'فرخ شهر',
                'stateId' => 6,
            ],
            [
                'name' => 'فسا',
                'stateId' => 24,
            ],
            [
                'name' => 'فریدون',
                'stateId' => 8,
            ],
            [
                'name' => 'فریدون کنار',
                'stateId' => 23,
            ],
            [
                'name' => 'فارسان',
                'stateId' => 6,
            ],
            [
                'name' => 'فیروزآباد',
                'stateId' => 24,
            ],
            [
                'name' => 'فومن',
                'stateId' => 5,
            ],
            [
                'name' => 'گراش',
                'stateId' => 24,
            ],
            [
                'name' => 'گلپایگان',
                'stateId' => 8,
            ],
            [
                'name' => 'گنبد کاووس',
                'stateId' => 18,
            ],
            [
                'name' => 'گناباد',
                'stateId' => 12,
            ],
            [
                'name' => 'گرگان',
                'stateId' => 18,
            ],
            [
                'name' => 'گتوند',
                'stateId' => 2,
            ],
            [
                'name' => 'حمیدیه',
                'stateId' => 2,
            ],
            [
                'name' => 'هامون',
                'stateId' => 16,
            ],
            [
                'name' => 'هرسین',
                'stateId' => 4,
            ],
            [
                'name' => 'هشتپر',
                'stateId' => 5,
            ],
            [
                'name' => 'هشت رود',
                'stateId' => 29,
            ],
            [
                'name' => 'ایرانشهر',
                'stateId' => 16,
            ],
            [
                'name' => 'اصفحان',
                'stateId' => 8,
            ],
            [
                'name' => 'جوان رود',
                'stateId' => 4,
            ],
            [
                'name' => 'جنگیه',
                'stateId' => 2,
            ],
            [
                'name' => 'جوین',
                'stateId' => 12,
            ],
            [
                'name' => 'جویبار',
                'stateId' => 23,
            ],
            [
                'name' => 'کاهریز',
                'stateId' => 4,
            ],
            [
                'name' => 'کلاله',
                'stateId' => 18,
            ],
            [
                'name' => 'کنگاور',
                'stateId' => 4,
            ],
            [
                'name' => 'کرج',
                'stateId' => 14,
            ],
            [
                'name' => 'کارون',
                'stateId' => 2,
            ],
            [
                'name' => 'کلیشاد و سودرجان',
                'stateId' => 8,
            ],
            [
                'name' => 'کرمان',
                'stateId' => 28,
            ],
            [
                'name' => 'کرمانشاه',
                'stateId' => 4,
            ],
            [
                'name' => 'خلخال',
                'stateId' => 19,
            ],
            [
                'name' => 'خواص کوه',
                'stateId' => 21,
            ],
            [
                'name' => 'خمین',
                'stateId' => 1,
            ],
            [
                'name' => 'خمینی شهر',
                'stateId' => 8,
            ],
            [
                'name' => 'خرم آباد',
                'stateId' => 13,
            ],
            [
                'name' => 'خرم دره',
                'stateId' => 10,
            ],
            [
                'name' => 'خرم شهر',
                'stateId' => 2,
            ],
            [
                'name' => 'خوی',
                'stateId' => 9,
            ],
            [
                'name' => 'خانسار',
                'stateId' => 8,
            ],
            [
                'name' => 'خارک',
                'stateId' => 17,
            ],
            [
                'name' => 'خاش',
                'stateId' => 16,
            ],
            [
                'name' => 'خور',
                'stateId' => 8,
            ],
            [
                'name' => 'کمیجان',
                'stateId' => 1,
            ],
            [
                'name' => 'کامیاران',
                'stateId' => 20,
            ],
            [
                'name' => 'کاشمر',
                'stateId' => 12,
            ],
            [
                'name' => 'کازرون',
                'stateId' => 24,
            ],
            [
                'name' => 'کیش',
                'stateId' => 22,
            ],
            [
                'name' => 'کوه سفید',
                'stateId' => 28,
            ],
            [
                'name' => 'کوهدشت',
                'stateId' => 13,
            ],
            [
                'name' => 'لنده',
                'stateId' => 11,
            ],
            [
                'name' => 'لنگرود',
                'stateId' => 5,
            ],
            [
                'name' => 'مهدی شهر',
                'stateId' => 25,
            ],
            [
                'name' => 'ماه ریز',
                'stateId' => 21,
            ],
            [
                'name' => 'مهاباد',
                'stateId' => 9,
            ],
            [
                'name' => 'ملارد',
                'stateId' => 30,
            ],
            [
                'name' => 'ممسنی',
                'stateId' => 24,
            ],
            [
                'name' => 'مرند',
                'stateId' => 29,
            ],
            [
                'name' => 'مرو دشت',
                'stateId' => 24,
            ],
            [
                'name' => 'مریوان',
                'stateId' => 20,
            ],
            [
                'name' => 'مشهد',
                'stateId' => 12,
            ],
            [
                'name' => 'مسجد سلیمان',
                'stateId' => 2,
            ],
            [
                'name' => 'مهران',
                'stateId' => 3,
            ],
            [
                'name' => 'میبد',
                'stateId' => 21,
            ],
            [
                'name' => 'میرجاوه',
                'stateId' => 16,
            ],
            [
                'name' => 'مبارکه',
                'stateId' => 8,
            ],
            [
                'name' => 'مهر',
                'stateId' => 24,
            ],
            [
                'name' => 'میناب',
                'stateId' => 22,
            ],
            [
                'name' => 'میاندوآب',
                'stateId' => 9,
            ],
            [
                'name' => 'نجف آباد',
                'stateId' => 8,
            ],
            [
                'name' => 'نقده',
                'stateId' => 9,
            ],
            [
                'name' => 'نشتارود',
                'stateId' => 23,
            ],
            [
                'name' => 'نظرآباد',
                'stateId' => 14,
            ],
            [
                'name' => 'نطنز',
                'stateId' => 8,
            ],
            [
                'name' => 'نکا',
                'stateId' => 23,
            ],
            [
                'name' => 'نیریز',
                'stateId' => 24,
            ],
            [
                'name' => 'نیشابور',
                'stateId' => 12,
            ],
            [
                'name' => 'نیمروز',
                'stateId' => 16,
            ],
            [
                'name' => 'نوشهر',
                'stateId' => 23,
            ],
            [
                'name' => 'نصرت آباد',
                'stateId' => 16,
            ],
            [
                'name' => 'نائین',
                'stateId' => 8,
            ],
            [
                'name' => 'نیک شهر',
                'stateId' => 16,
            ],
            [
                'name' => 'نورآباد',
                'stateId' => 13,
            ],
            [
                'name' => 'نورآباد',
                'stateId' => 24,
            ],
            [
                'name' => 'امیدچه',
                'stateId' => 19,
            ],
            [
                'name' => 'امیدیه',
                'stateId' => 2,
            ],
            [
                'name' => 'ارومیه',
                'stateId' => 9,
            ],
            [
                'name' => 'اوشنویه',
                'stateId' => 9,
            ],
            [
                'name' => 'پردیس',
                'stateId' => 30,
            ],
            [
                'name' => 'پیرانشهر',
                'stateId' => 9,
            ],
            [
                'name' => 'پلدختر',
                'stateId' => 13,
            ],
            [
                'name' => 'پلدشت',
                'stateId' => 9,
            ],
            [
                'name' => 'منجیل',
                'stateId' => 5,
            ],
            [
                'name' => 'پارس آباد',
                'stateId' => 19,
            ],
            [
                'name' => 'پاسارگاد',
                'stateId' => 24,
            ],
            [
                'name' => 'پاوه',
                'stateId' => 4,
            ],
            [
                'name' => 'پیشوا',
                'stateId' => 30,
            ],
            [
                'name' => 'قهدريجان',
                'stateId' => 8,
            ],
            [
                'name' => 'قره ضیاالدین',
                'stateId' => 9,
            ],
            [
                'name' => 'قرچک',
                'stateId' => 30,
            ],
            [
                'name' => 'قصرقند',
                'stateId' => 16,
            ],
            [
                'name' => 'قزوین',
                'stateId' => 26,
            ],
            [
                'name' => 'قشم',
                'stateId' => 22,
            ],
            [
                'name' => 'قدس',
                'stateId' => 30,
            ],
            [
                'name' => 'قم',
                'stateId' => 7,
            ],
            [
                'name' => 'قروه',
                'stateId' => 20,
            ],
            [
                'name' => 'قائن',
                'stateId' => 15,
            ],
            [
                'name' => 'قوچان',
                'stateId' => 12,
            ],
            [
                'name' => 'رفسنجان',
                'stateId' => 28,
            ],
            [
                'name' => 'رشت',
                'stateId' => 5,
            ],
            [
                'name' => 'رازوجرگلان',
                'stateId' => 27,
            ],
            [
                'name' => 'رهنان',
                'stateId' => 8,
            ],
            [
                'name' => 'ری',
                'stateId' => 30,
            ],
            [
                'name' => 'رضوانشهر',
                'stateId' => 5,
            ],
            [
                'name' => 'رباط کریم',
                'stateId' => 30,
            ],
            [
                'name' => 'رستم',
                'stateId' => 24,
            ],
            [
                'name' => 'رومشکان',
                'stateId' => 13,
            ],
            [
                'name' => 'رامهرمز',
                'stateId' => 2,
            ],
            [
                'name' => 'رامشهر',
                'stateId' => 2,
            ],
            [
                'name' => 'راور',
                'stateId' => 28,
            ],
            [
                'name' => 'ریگان',
                'stateId' => 28,
            ],
            [
                'name' => 'رودسر',
                'stateId' => 5,
            ],
            [
                'name' => 'سبزوار',
                'stateId' => 12,
            ],
            [
                'name' => 'سلماس',
                'stateId' => 9,
            ],
            [
                'name' => 'سامان',
                'stateId' => 6,
            ],
            [
                'name' => 'سنندج',
                'stateId' => 20,
            ],
            [
                'name' => 'سقز',
                'stateId' => 20,
            ],
            [
                'name' => 'سرخس',
                'stateId' => 12,
            ],
            [
                'name' => 'سردشت',
                'stateId' => 9,
            ],
            [
                'name' => 'ساری',
                'stateId' => 23,
            ],
            [
                'name' => 'سرپل ذهاب',
                'stateId' => 4,
            ],
            [
                'name' => 'سراب',
                'stateId' => 29,
            ],
            [
                'name' => 'سوادکوه شمالی',
                'stateId' => 23,
            ],
            [
                'name' => 'سلسله',
                'stateId' => 13,
            ],
            [
                'name' => 'سمنان',
                'stateId' => 25,
            ],
            [
                'name' => 'سميرم',
                'stateId' => 8,
            ],
            [
                'name' => 'شهربابک',
                'stateId' => 28,
            ],
            [
                'name' => 'شهرقدیم لار',
                'stateId' => 24,
            ],
            [
                'name' => 'شهرک امام حسن',
                'stateId' => 30,
            ],
            [
                'name' => 'شهرک کلوری',
                'stateId' => 2,
            ],
            [
                'name' => 'شهرک پابدانا',
                'stateId' => 28,
            ],
            [
                'name' => 'شهرجدید اندیشه',
                'stateId' => 30,
            ],
            [
                'name' => 'شهرکرد',
                'stateId' => 6,
            ],
            [
                'name' => 'کلار دشت',
                'stateId' => 23,
            ],
            [
                'name' => 'ابرکوه',
                'stateId' => 21,
            ],
            [
                'name' => 'ابوموسی',
                'stateId' => 22,
            ],
            [
                'name' => 'الیگودرز',
                'stateId' => 13,
            ],
            [
                'name' => 'اندیکا',
                'stateId' => 2,
            ],
            [
                'name' => 'اندیمشک',
                'stateId' => 2,
            ],
            [
                'name' => 'انار',
                'stateId' => 28,
            ],
            [
                'name' => 'ارسنجان',
                'stateId' => 24,
            ],
            [
                'name' => 'گمیشان',
                'stateId' => 18,
            ],
            [
                'name' => 'گالیکش',
                'stateId' => 18,
            ],
            [
                'name' => 'کردکوی',
                'stateId' => 18,
            ],
            [
                'name' => 'مراوه تپه',
                'stateId' => 18,
            ],
            [
                'name' => 'مینودشت',
                'stateId' => 18,
            ],
            [
                'name' => 'رامیان',
                'stateId' => 18,
            ],
            [
                'name' => 'آق قلا',
                'stateId' => 18,
            ],
            [
                'name' => 'علی آباد',
                'stateId' => 18,
            ],
            [
                'name' => 'شهرضا',
                'stateId' => 8,
            ],
            [
                'name' => 'شاهرود',
                'stateId' => 25,
            ],
            [
                'name' => 'شهریار',
                'stateId' => 30,
            ],
            [
                'name' => 'شریف آباد',
                'stateId' => 30,
            ],
            [
                'name' => 'شیراز',
                'stateId' => 24,
            ],
            [
                'name' => 'شادگان',
                'stateId' => 2,
            ],
            [
                'name' => 'شاهین دژ',
                'stateId' => 9,
            ],
            [
                'name' => 'شاهین شهر',
                'stateId' => 8,
            ],
            [
                'name' => 'شیروان',
                'stateId' => 27,
            ],
            [
                'name' => 'شوش',
                'stateId' => 2,
            ],
            [
                'name' => 'شوشتر',
                'stateId' => 2,
            ],
            [
                'name' => 'سیمرغ',
                'stateId' => 23,
            ],
            [
                'name' => 'سیرجان',
                'stateId' => 28,
            ],
            [
                'name' => 'سیروان',
                'stateId' => 3,
            ],
            [
                'name' => 'سله بن',
                'stateId' => 30,
            ],
            [
                'name' => 'سلطانیه',
                'stateId' => 10,
            ],
            [
                'name' => 'سنقر',
                'stateId' => 4,
            ],
            [
                'name' => 'ساوه',
                'stateId' => 1,
            ],
            [
                'name' => 'سوسنگرد',
                'stateId' => 2,
            ],
            [
                'name' => 'طبس',
                'stateId' => 21,
            ],
            [
                'name' => 'طبس',
                'stateId' => 15,
            ],
            [
                'name' => 'تبریز',
                'stateId' => 29,
            ],
            [
                'name' => 'تفرش',
                'stateId' => 1,
            ],
            [
                'name' => 'تافت',
                'stateId' => 21,
            ],
            [
                'name' => 'تکاب',
                'stateId' => 9,
            ],
            [
                'name' => 'تهران',
                'stateId' => 30,
            ],
            [
                'name' => 'تنکابن',
                'stateId' => 23,
            ],
            [
                'name' => 'تربت جام',
                'stateId' => 12,
            ],
            [
                'name' => 'تربت حیدریه',
                'stateId' => 12,
            ],
            [
                'name' => 'بندر ترکمن',
                'stateId' => 18,
            ],
            [
                'name' => 'تاکستان',
                'stateId' => 26,
            ],
            [
                'name' => 'تایباد',
                'stateId' => 12,
            ],
            [
                'name' => 'تیران',
                'stateId' => 8,
            ],
            [
                'name' => 'ورامین',
                'stateId' => 30,
            ],
            [
                'name' => 'ویسیان',
                'stateId' => 13,
            ],
            [
                'name' => 'یاسوج',
                'stateId' => 11,
            ],
            [
                'name' => 'یزد',
                'stateId' => 21,
            ],
            [
                'name' => 'زاهدان',
                'stateId' => 16,
            ],
            [
                'name' => 'زنجان',
                'stateId' => 10,
            ],
            [
                'name' => 'زرند',
                'stateId' => 28,
            ],
            [
                'name' => 'زرین شهر',
                'stateId' => 8,
            ],
            [
                'name' => 'زهک',
                'stateId' => 16,
            ],
            [
                'name' => 'ضیابر',
                'stateId' => 5,
            ],
            [
                'name' => 'زابل',
                'stateId' => 16,
            ],
            [
                'name' => 'ثدین یک',
                'stateId' => 2,
            ],
            [
                'name' => 'آبادانا',
                'stateId' => 3,
            ],
            [
                'name' => 'آبیک',
                'stateId' => 1,
            ],
            [
                'name' => 'آباده',
                'stateId' => 24,
            ],
            [
                'name' => 'آمل',
                'stateId' => 23,
            ],
            [
                'name' => 'آستانه اشرفيه',
                'stateId' => 5,
            ],
            [
                'name' => 'آستارا',
                'stateId' => 5,
            ],
            [
                'name' => 'آزادشهر',
                'stateId' => 18,
            ],
            [
                'name' => 'ایلام',
                'stateId' => 3,
            ],
            [
                'name' => 'گرمسار',
                'stateId' => 25,
            ],
            [
                'name' => 'طالب آباد',
                'stateId' => 30,
            ],
            [
                'name' => 'عجب شیر',
                'stateId' => 29,
            ]
        ]);

    }
}
