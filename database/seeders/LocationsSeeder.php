<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insertOrIgnore([
            [
                'title' => 'مرکزی',
            ],
            [
                'title' => 'خوزستان',
            ],
            [
                'title' => 'ایلام',
            ],
            [
                'title' => 'کرمانشاه',
            ],
            [
                'title' => 'گیلان',
            ],
            [
                'title' => 'چهارمحال بختیاری',
            ],
            [
                'title' => 'قم',
            ],
            [
                'title' => 'اصفحان',
            ],
            [
                'title' => 'آذربایجان غربی',
            ],
            [
                'title' => 'زنجان',
            ],
            [
                'title' => 'کهگیلویه و بویراحمد',
            ],
            [
                'title' => 'خراسان رضوی',
            ],
            [
                'title' => 'لرستان',
            ],
            [
                'title' => 'البرز',
            ],
            [
                'title' => 'خراسان جنوبی',
            ],
            [
                'title' => 'سیستان و بلوچستان',
            ],
            [
                'title' => 'بوشهر',
            ],
            [
                'title' => 'گلستان',
            ],
            [
                'title' => 'اردبیل',
            ],
            [
                'title' => 'کردستان',
            ],
            [
                'title' => 'یزد',
            ],
            [
                'title' => 'هرمزگان',
            ],
            [
                'title' => 'مازندران',
            ],
            [
                'title' => 'فارس',
            ],
            [
                'title' => 'سمنان',
            ],
            [
                'title' => 'قزوین',
            ],
            [
                'title' => 'خراسان شمالی',
            ],
            [
                'title' => 'کرمان',
            ],
            [
                'title' => 'آذرباییجان شرقی',
            ],
            [
                'title' => 'تهران',
            ]
        ]);
        DB::table('cities')->insertOrIgnore([
            [
                'title' => 'آبادان',
                'state_id' => 2,
            ],
            [
                'title' => 'ابهر',
                'state_id' => 10,
            ],
            [
                'title' => 'ابریشم',
                'state_id' => 8,
            ],
            [
                'title' => 'آقاجاری',
                'state_id' => 2,
            ],
            [
                'title' => 'اهر',
                'state_id' => 29,
            ],
            [
                'title' => 'اهرم',
                'state_id' => 17,
            ],
            [
                'title' => 'اهواز',
                'state_id' => 2,
            ],
            [
                'title' => 'اکبرآباد',
                'state_id' => 24,
            ],
            [
                'title' => 'البرز',
                'state_id' => 26,
            ],
            [
                'title' => 'الشتر',
                'state_id' => 13,
            ],
            [
                'title' => 'الوند',
                'state_id' => 26,
            ],
            [
                'title' => 'الوند',
                'state_id' => 10,
            ],
            [
                'title' => 'اردبیل',
                'state_id' => 19,
            ],
            [
                'title' => 'اردکان',
                'state_id' => 21,
            ],
            [
                'title' => 'اردستان',
                'state_id' => 8,
            ],
            [
                'title' => 'اراک',
                'state_id' => 1,
            ],
            [
                'title' => 'اوج',
                'state_id' => 26,
            ],
            [
                'title' => 'ازنا',
                'state_id' => 13,
            ],
            [
                'title' => 'بدره',
                'state_id' => 3,
            ],
            [
                'title' => 'بم',
                'state_id' => 28,
            ],
            [
                'title' => 'بندرعباس',
                'state_id' => 22,
            ],
            [
                'title' => 'بندرلنگه',
                'state_id' => 22,
            ],
            [
                'title' => 'بندرانزلی',
                'state_id' => 5,
            ],
            [
                'title' => 'بندرگناوه',
                'state_id' => 17,
            ],
            [
                'title' => 'بردسکن',
                'state_id' => 12,
            ],
            [
                'title' => 'بردسیر',
                'state_id' => 28,
            ],
            [
                'title' => 'بستک',
                'state_id' => 22,
            ],
            [
                'title' => 'بهبهان',
                'state_id' => 2,
            ],
            [
                'title' => 'بهشهر',
                'state_id' => 23,
            ],
            [
                'title' => 'بن',
                'state_id' => 6,
            ],
            [
                'title' => 'بجنورد',
                'state_id' => 27,
            ],
            [
                'title' => 'بناب',
                'state_id' => 29,
            ],
            [
                'title' => 'برازجان',
                'state_id' => 17,
            ],
            [
                'title' => 'بروجن',
                'state_id' => 6,
            ],
            [
                'title' => 'بروجرد',
                'state_id' => 13,
            ],
            [
                'title' => 'بشرویه',
                'state_id' => 15,
            ],
            [
                'title' => 'بوئین و میاندشت',
                'state_id' => 8,
            ],
            [
                'title' => 'بوشهر',
                'state_id' => 17,
            ],
            [
                'title' => 'بابل',
                'state_id' => 23,
            ],
            [
                'title' => 'بابلسر',
                'state_id' => 23,
            ],
            [
                'title' => 'بافق',
                'state_id' => 21,
            ],
            [
                'title' => 'بافت',
                'state_id' => 28,
            ],
            [
                'title' => 'باغ ملک',
                'state_id' => 2,
            ],
            [
                'title' => 'بانه',
                'state_id' => 20,
            ],
            [
                'title' => 'بیجار',
                'state_id' => 20,
            ],
            [
                'title' => 'بیله سوار',
                'state_id' => 19,
            ],
            [
                'title' => 'بیرجند',
                'state_id' => 15,
            ],
            [
                'title' => 'بوکان',
                'state_id' => 9,
            ],
            [
                'title' => 'چابهار',
                'state_id' => 16,
            ],
            [
                'title' => 'چرداول',
                'state_id' => 3,
            ],
            [
                'title' => 'چلگرد',
                'state_id' => 6,
            ],
            [
                'title' => 'چناران',
                'state_id' => 12,
            ],
            [
                'title' => 'چادگان',
                'state_id' => 8,
            ],
            [
                'title' => 'چالوس',
                'state_id' => 23,
            ],
            [
                'title' => 'چایپاره',
                'state_id' => 9,
            ],
            [
                'title' => 'دماوند',
                'state_id' => 30,
            ],
            [
                'title' => 'درگز',
                'state_id' => 12,
            ],
            [
                'title' => 'دره شهر',
                'state_id' => 3,
            ],
            [
                'title' => 'ده دشت',
                'state_id' => 11,
            ],
            [
                'title' => 'دهلران',
                'state_id' => 3,
            ],
            [
                'title' => 'دهاقان',
                'state_id' => 8,
            ],
            [
                'title' => 'دلفان',
                'state_id' => 13,
            ],
            [
                'title' => 'دلیجان',
                'state_id' => 1,
            ],
            [
                'title' => 'دیلم',
                'state_id' => 17,
            ],
            [
                'title' => 'گچساران',
                'state_id' => 11,
            ],
            [
                'title' => 'درچه',
                'state_id' => 8,
            ],
            [
                'title' => 'دولت آباد',
                'state_id' => 8,
            ],
            [
                'title' => 'دامغان',
                'state_id' => 25,
            ],
            [
                'title' => 'داراب',
                'state_id' => 24,
            ],
            [
                'title' => 'داران',
                'state_id' => 8,
            ],
            [
                'title' => 'داورزن',
                'state_id' => 12,
            ],
            [
                'title' => 'اقبالیه',
                'state_id' => 30,
            ],
            [
                'title' => 'اسفراین',
                'state_id' => 27,
            ],
            [
                'title' => 'اسلام شهر',
                'state_id' => 30,
            ],
            [
                'title' => 'فلاورجان',
                'state_id' => 8,
            ],
            [
                'title' => 'فنوج',
                'state_id' => 16,
            ],
            [
                'title' => 'فردیس',
                'state_id' => 14,
            ],
            [
                'title' => 'فریدون شهر',
                'state_id' => 8,
            ],
            [
                'title' => 'فرخ شهر',
                'state_id' => 6,
            ],
            [
                'title' => 'فسا',
                'state_id' => 24,
            ],
            [
                'title' => 'فریدون',
                'state_id' => 8,
            ],
            [
                'title' => 'فریدون کنار',
                'state_id' => 23,
            ],
            [
                'title' => 'فارسان',
                'state_id' => 6,
            ],
            [
                'title' => 'فیروزآباد',
                'state_id' => 24,
            ],
            [
                'title' => 'فومن',
                'state_id' => 5,
            ],
            [
                'title' => 'گراش',
                'state_id' => 24,
            ],
            [
                'title' => 'گلپایگان',
                'state_id' => 8,
            ],
            [
                'title' => 'گنبد کاووس',
                'state_id' => 18,
            ],
            [
                'title' => 'گناباد',
                'state_id' => 12,
            ],
            [
                'title' => 'گرگان',
                'state_id' => 18,
            ],
            [
                'title' => 'گتوند',
                'state_id' => 2,
            ],
            [
                'title' => 'حمیدیه',
                'state_id' => 2,
            ],
            [
                'title' => 'هامون',
                'state_id' => 16,
            ],
            [
                'title' => 'هرسین',
                'state_id' => 4,
            ],
            [
                'title' => 'هشتپر',
                'state_id' => 5,
            ],
            [
                'title' => 'هشت رود',
                'state_id' => 29,
            ],
            [
                'title' => 'ایرانشهر',
                'state_id' => 16,
            ],
            [
                'title' => 'اصفحان',
                'state_id' => 8,
            ],
            [
                'title' => 'جوان رود',
                'state_id' => 4,
            ],
            [
                'title' => 'جنگیه',
                'state_id' => 2,
            ],
            [
                'title' => 'جوین',
                'state_id' => 12,
            ],
            [
                'title' => 'جویبار',
                'state_id' => 23,
            ],
            [
                'title' => 'کاهریز',
                'state_id' => 4,
            ],
            [
                'title' => 'کلاله',
                'state_id' => 18,
            ],
            [
                'title' => 'کنگاور',
                'state_id' => 4,
            ],
            [
                'title' => 'کرج',
                'state_id' => 14,
            ],
            [
                'title' => 'کارون',
                'state_id' => 2,
            ],
            [
                'title' => 'کلیشاد و سودرجان',
                'state_id' => 8,
            ],
            [
                'title' => 'کرمان',
                'state_id' => 28,
            ],
            [
                'title' => 'کرمانشاه',
                'state_id' => 4,
            ],
            [
                'title' => 'خلخال',
                'state_id' => 19,
            ],
            [
                'title' => 'خواص کوه',
                'state_id' => 21,
            ],
            [
                'title' => 'خمین',
                'state_id' => 1,
            ],
            [
                'title' => 'خمینی شهر',
                'state_id' => 8,
            ],
            [
                'title' => 'خرم آباد',
                'state_id' => 13,
            ],
            [
                'title' => 'خرم دره',
                'state_id' => 10,
            ],
            [
                'title' => 'خرم شهر',
                'state_id' => 2,
            ],
            [
                'title' => 'خوی',
                'state_id' => 9,
            ],
            [
                'title' => 'خانسار',
                'state_id' => 8,
            ],
            [
                'title' => 'خارک',
                'state_id' => 17,
            ],
            [
                'title' => 'خاش',
                'state_id' => 16,
            ],
            [
                'title' => 'خور',
                'state_id' => 8,
            ],
            [
                'title' => 'کمیجان',
                'state_id' => 1,
            ],
            [
                'title' => 'کامیاران',
                'state_id' => 20,
            ],
            [
                'title' => 'کاشمر',
                'state_id' => 12,
            ],
            [
                'title' => 'کازرون',
                'state_id' => 24,
            ],
            [
                'title' => 'کیش',
                'state_id' => 22,
            ],
            [
                'title' => 'کوه سفید',
                'state_id' => 28,
            ],
            [
                'title' => 'کوهدشت',
                'state_id' => 13,
            ],
            [
                'title' => 'لنده',
                'state_id' => 11,
            ],
            [
                'title' => 'لنگرود',
                'state_id' => 5,
            ],
            [
                'title' => 'مهدی شهر',
                'state_id' => 25,
            ],
            [
                'title' => 'ماه ریز',
                'state_id' => 21,
            ],
            [
                'title' => 'مهاباد',
                'state_id' => 9,
            ],
            [
                'title' => 'ملارد',
                'state_id' => 30,
            ],
            [
                'title' => 'ممسنی',
                'state_id' => 24,
            ],
            [
                'title' => 'مرند',
                'state_id' => 29,
            ],
            [
                'title' => 'مرو دشت',
                'state_id' => 24,
            ],
            [
                'title' => 'مریوان',
                'state_id' => 20,
            ],
            [
                'title' => 'مشهد',
                'state_id' => 12,
            ],
            [
                'title' => 'مسجد سلیمان',
                'state_id' => 2,
            ],
            [
                'title' => 'مهران',
                'state_id' => 3,
            ],
            [
                'title' => 'میبد',
                'state_id' => 21,
            ],
            [
                'title' => 'میرجاوه',
                'state_id' => 16,
            ],
            [
                'title' => 'مبارکه',
                'state_id' => 8,
            ],
            [
                'title' => 'مهر',
                'state_id' => 24,
            ],
            [
                'title' => 'میناب',
                'state_id' => 22,
            ],
            [
                'title' => 'میاندوآب',
                'state_id' => 9,
            ],
            [
                'title' => 'نجف آباد',
                'state_id' => 8,
            ],
            [
                'title' => 'نقده',
                'state_id' => 9,
            ],
            [
                'title' => 'نشتارود',
                'state_id' => 23,
            ],
            [
                'title' => 'نظرآباد',
                'state_id' => 14,
            ],
            [
                'title' => 'نطنز',
                'state_id' => 8,
            ],
            [
                'title' => 'نکا',
                'state_id' => 23,
            ],
            [
                'title' => 'نیریز',
                'state_id' => 24,
            ],
            [
                'title' => 'نیشابور',
                'state_id' => 12,
            ],
            [
                'title' => 'نیمروز',
                'state_id' => 16,
            ],
            [
                'title' => 'نوشهر',
                'state_id' => 23,
            ],
            [
                'title' => 'نصرت آباد',
                'state_id' => 16,
            ],
            [
                'title' => 'نائین',
                'state_id' => 8,
            ],
            [
                'title' => 'نیک شهر',
                'state_id' => 16,
            ],
            [
                'title' => 'نورآباد',
                'state_id' => 13,
            ],
            [
                'title' => 'نورآباد',
                'state_id' => 24,
            ],
            [
                'title' => 'امیدچه',
                'state_id' => 19,
            ],
            [
                'title' => 'امیدیه',
                'state_id' => 2,
            ],
            [
                'title' => 'ارومیه',
                'state_id' => 9,
            ],
            [
                'title' => 'اوشنویه',
                'state_id' => 9,
            ],
            [
                'title' => 'پردیس',
                'state_id' => 30,
            ],
            [
                'title' => 'پیرانشهر',
                'state_id' => 9,
            ],
            [
                'title' => 'پلدختر',
                'state_id' => 13,
            ],
            [
                'title' => 'پلدشت',
                'state_id' => 9,
            ],
            [
                'title' => 'منجیل',
                'state_id' => 5,
            ],
            [
                'title' => 'پارس آباد',
                'state_id' => 19,
            ],
            [
                'title' => 'پاسارگاد',
                'state_id' => 24,
            ],
            [
                'title' => 'پاوه',
                'state_id' => 4,
            ],
            [
                'title' => 'پیشوا',
                'state_id' => 30,
            ],
            [
                'title' => 'قهدريجان',
                'state_id' => 8,
            ],
            [
                'title' => 'قره ضیاالدین',
                'state_id' => 9,
            ],
            [
                'title' => 'قرچک',
                'state_id' => 30,
            ],
            [
                'title' => 'قصرقند',
                'state_id' => 16,
            ],
            [
                'title' => 'قزوین',
                'state_id' => 26,
            ],
            [
                'title' => 'قشم',
                'state_id' => 22,
            ],
            [
                'title' => 'قدس',
                'state_id' => 30,
            ],
            [
                'title' => 'قم',
                'state_id' => 7,
            ],
            [
                'title' => 'قروه',
                'state_id' => 20,
            ],
            [
                'title' => 'قائن',
                'state_id' => 15,
            ],
            [
                'title' => 'قوچان',
                'state_id' => 12,
            ],
            [
                'title' => 'رفسنجان',
                'state_id' => 28,
            ],
            [
                'title' => 'رشت',
                'state_id' => 5,
            ],
            [
                'title' => 'رازوجرگلان',
                'state_id' => 27,
            ],
            [
                'title' => 'رهنان',
                'state_id' => 8,
            ],
            [
                'title' => 'ری',
                'state_id' => 30,
            ],
            [
                'title' => 'رضوانشهر',
                'state_id' => 5,
            ],
            [
                'title' => 'رباط کریم',
                'state_id' => 30,
            ],
            [
                'title' => 'رستم',
                'state_id' => 24,
            ],
            [
                'title' => 'رومشکان',
                'state_id' => 13,
            ],
            [
                'title' => 'رامهرمز',
                'state_id' => 2,
            ],
            [
                'title' => 'رامشهر',
                'state_id' => 2,
            ],
            [
                'title' => 'راور',
                'state_id' => 28,
            ],
            [
                'title' => 'ریگان',
                'state_id' => 28,
            ],
            [
                'title' => 'رودسر',
                'state_id' => 5,
            ],
            [
                'title' => 'سبزوار',
                'state_id' => 12,
            ],
            [
                'title' => 'سلماس',
                'state_id' => 9,
            ],
            [
                'title' => 'سامان',
                'state_id' => 6,
            ],
            [
                'title' => 'سنندج',
                'state_id' => 20,
            ],
            [
                'title' => 'سقز',
                'state_id' => 20,
            ],
            [
                'title' => 'سرخس',
                'state_id' => 12,
            ],
            [
                'title' => 'سردشت',
                'state_id' => 9,
            ],
            [
                'title' => 'ساری',
                'state_id' => 23,
            ],
            [
                'title' => 'سرپل ذهاب',
                'state_id' => 4,
            ],
            [
                'title' => 'سراب',
                'state_id' => 29,
            ],
            [
                'title' => 'سوادکوه شمالی',
                'state_id' => 23,
            ],
            [
                'title' => 'سلسله',
                'state_id' => 13,
            ],
            [
                'title' => 'سمنان',
                'state_id' => 25,
            ],
            [
                'title' => 'سميرم',
                'state_id' => 8,
            ],
            [
                'title' => 'شهربابک',
                'state_id' => 28,
            ],
            [
                'title' => 'شهرقدیم لار',
                'state_id' => 24,
            ],
            [
                'title' => 'شهرک امام حسن',
                'state_id' => 30,
            ],
            [
                'title' => 'شهرک کلوری',
                'state_id' => 2,
            ],
            [
                'title' => 'شهرک پابدانا',
                'state_id' => 28,
            ],
            [
                'title' => 'شهرجدید اندیشه',
                'state_id' => 30,
            ],
            [
                'title' => 'شهرکرد',
                'state_id' => 6,
            ],
            [
                'title' => 'کلار دشت',
                'state_id' => 23,
            ],
            [
                'title' => 'ابرکوه',
                'state_id' => 21,
            ],
            [
                'title' => 'ابوموسی',
                'state_id' => 22,
            ],
            [
                'title' => 'الیگودرز',
                'state_id' => 13,
            ],
            [
                'title' => 'اندیکا',
                'state_id' => 2,
            ],
            [
                'title' => 'اندیمشک',
                'state_id' => 2,
            ],
            [
                'title' => 'انار',
                'state_id' => 28,
            ],
            [
                'title' => 'ارسنجان',
                'state_id' => 24,
            ],
            [
                'title' => 'گمیشان',
                'state_id' => 18,
            ],
            [
                'title' => 'گالیکش',
                'state_id' => 18,
            ],
            [
                'title' => 'کردکوی',
                'state_id' => 18,
            ],
            [
                'title' => 'مراوه تپه',
                'state_id' => 18,
            ],
            [
                'title' => 'مینودشت',
                'state_id' => 18,
            ],
            [
                'title' => 'رامیان',
                'state_id' => 18,
            ],
            [
                'title' => 'آق قلا',
                'state_id' => 18,
            ],
            [
                'title' => 'علی آباد',
                'state_id' => 18,
            ],
            [
                'title' => 'شهرضا',
                'state_id' => 8,
            ],
            [
                'title' => 'شاهرود',
                'state_id' => 25,
            ],
            [
                'title' => 'شهریار',
                'state_id' => 30,
            ],
            [
                'title' => 'شریف آباد',
                'state_id' => 30,
            ],
            [
                'title' => 'شیراز',
                'state_id' => 24,
            ],
            [
                'title' => 'شادگان',
                'state_id' => 2,
            ],
            [
                'title' => 'شاهین دژ',
                'state_id' => 9,
            ],
            [
                'title' => 'شاهین شهر',
                'state_id' => 8,
            ],
            [
                'title' => 'شیروان',
                'state_id' => 27,
            ],
            [
                'title' => 'شوش',
                'state_id' => 2,
            ],
            [
                'title' => 'شوشتر',
                'state_id' => 2,
            ],
            [
                'title' => 'سیمرغ',
                'state_id' => 23,
            ],
            [
                'title' => 'سیرجان',
                'state_id' => 28,
            ],
            [
                'title' => 'سیروان',
                'state_id' => 3,
            ],
            [
                'title' => 'سله بن',
                'state_id' => 30,
            ],
            [
                'title' => 'سلطانیه',
                'state_id' => 10,
            ],
            [
                'title' => 'سنقر',
                'state_id' => 4,
            ],
            [
                'title' => 'ساوه',
                'state_id' => 1,
            ],
            [
                'title' => 'سوسنگرد',
                'state_id' => 2,
            ],
            [
                'title' => 'طبس',
                'state_id' => 21,
            ],
            [
                'title' => 'طبس',
                'state_id' => 15,
            ],
            [
                'title' => 'تبریز',
                'state_id' => 29,
            ],
            [
                'title' => 'تفرش',
                'state_id' => 1,
            ],
            [
                'title' => 'تافت',
                'state_id' => 21,
            ],
            [
                'title' => 'تکاب',
                'state_id' => 9,
            ],
            [
                'title' => 'تهران',
                'state_id' => 30,
            ],
            [
                'title' => 'تنکابن',
                'state_id' => 23,
            ],
            [
                'title' => 'تربت جام',
                'state_id' => 12,
            ],
            [
                'title' => 'تربت حیدریه',
                'state_id' => 12,
            ],
            [
                'title' => 'بندر ترکمن',
                'state_id' => 18,
            ],
            [
                'title' => 'تاکستان',
                'state_id' => 26,
            ],
            [
                'title' => 'تایباد',
                'state_id' => 12,
            ],
            [
                'title' => 'تیران',
                'state_id' => 8,
            ],
            [
                'title' => 'ورامین',
                'state_id' => 30,
            ],
            [
                'title' => 'ویسیان',
                'state_id' => 13,
            ],
            [
                'title' => 'یاسوج',
                'state_id' => 11,
            ],
            [
                'title' => 'یزد',
                'state_id' => 21,
            ],
            [
                'title' => 'زاهدان',
                'state_id' => 16,
            ],
            [
                'title' => 'زنجان',
                'state_id' => 10,
            ],
            [
                'title' => 'زرند',
                'state_id' => 28,
            ],
            [
                'title' => 'زرین شهر',
                'state_id' => 8,
            ],
            [
                'title' => 'زهک',
                'state_id' => 16,
            ],
            [
                'title' => 'ضیابر',
                'state_id' => 5,
            ],
            [
                'title' => 'زابل',
                'state_id' => 16,
            ],
            [
                'title' => 'ثدین یک',
                'state_id' => 2,
            ],
            [
                'title' => 'آبادانا',
                'state_id' => 3,
            ],
            [
                'title' => 'آبیک',
                'state_id' => 1,
            ],
            [
                'title' => 'آباده',
                'state_id' => 24,
            ],
            [
                'title' => 'آمل',
                'state_id' => 23,
            ],
            [
                'title' => 'آستانه اشرفيه',
                'state_id' => 5,
            ],
            [
                'title' => 'آستارا',
                'state_id' => 5,
            ],
            [
                'title' => 'آزادشهر',
                'state_id' => 18,
            ],
            [
                'title' => 'ایلام',
                'state_id' => 3,
            ],
            [
                'title' => 'گرمسار',
                'state_id' => 25,
            ],
            [
                'title' => 'طالب آباد',
                'state_id' => 30,
            ],
            [
                'title' => 'عجب شیر',
                'state_id' => 29,
            ]
        ]);
    }
}
