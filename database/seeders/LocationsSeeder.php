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
                'stateId' => 2,
            ],
            [
                'title' => 'ابهر',
                'stateId' => 10,
            ],
            [
                'title' => 'ابریشم',
                'stateId' => 8,
            ],
            [
                'title' => 'آقاجاری',
                'stateId' => 2,
            ],
            [
                'title' => 'اهر',
                'stateId' => 29,
            ],
            [
                'title' => 'اهرم',
                'stateId' => 17,
            ],
            [
                'title' => 'اهواز',
                'stateId' => 2,
            ],
            [
                'title' => 'اکبرآباد',
                'stateId' => 24,
            ],
            [
                'title' => 'البرز',
                'stateId' => 26,
            ],
            [
                'title' => 'الشتر',
                'stateId' => 13,
            ],
            [
                'title' => 'الوند',
                'stateId' => 26,
            ],
            [
                'title' => 'الوند',
                'stateId' => 10,
            ],
            [
                'title' => 'اردبیل',
                'stateId' => 19,
            ],
            [
                'title' => 'اردکان',
                'stateId' => 21,
            ],
            [
                'title' => 'اردستان',
                'stateId' => 8,
            ],
            [
                'title' => 'اراک',
                'stateId' => 1,
            ],
            [
                'title' => 'اوج',
                'stateId' => 26,
            ],
            [
                'title' => 'ازنا',
                'stateId' => 13,
            ],
            [
                'title' => 'بدره',
                'stateId' => 3,
            ],
            [
                'title' => 'بم',
                'stateId' => 28,
            ],
            [
                'title' => 'بندرعباس',
                'stateId' => 22,
            ],
            [
                'title' => 'بندرلنگه',
                'stateId' => 22,
            ],
            [
                'title' => 'بندرانزلی',
                'stateId' => 5,
            ],
            [
                'title' => 'بندرگناوه',
                'stateId' => 17,
            ],
            [
                'title' => 'بردسکن',
                'stateId' => 12,
            ],
            [
                'title' => 'بردسیر',
                'stateId' => 28,
            ],
            [
                'title' => 'بستک',
                'stateId' => 22,
            ],
            [
                'title' => 'بهبهان',
                'stateId' => 2,
            ],
            [
                'title' => 'بهشهر',
                'stateId' => 23,
            ],
            [
                'title' => 'بن',
                'stateId' => 6,
            ],
            [
                'title' => 'بجنورد',
                'stateId' => 27,
            ],
            [
                'title' => 'بناب',
                'stateId' => 29,
            ],
            [
                'title' => 'برازجان',
                'stateId' => 17,
            ],
            [
                'title' => 'بروجن',
                'stateId' => 6,
            ],
            [
                'title' => 'بروجرد',
                'stateId' => 13,
            ],
            [
                'title' => 'بشرویه',
                'stateId' => 15,
            ],
            [
                'title' => 'بوئین و میاندشت',
                'stateId' => 8,
            ],
            [
                'title' => 'بوشهر',
                'stateId' => 17,
            ],
            [
                'title' => 'بابل',
                'stateId' => 23,
            ],
            [
                'title' => 'بابلسر',
                'stateId' => 23,
            ],
            [
                'title' => 'بافق',
                'stateId' => 21,
            ],
            [
                'title' => 'بافت',
                'stateId' => 28,
            ],
            [
                'title' => 'باغ ملک',
                'stateId' => 2,
            ],
            [
                'title' => 'بانه',
                'stateId' => 20,
            ],
            [
                'title' => 'بیجار',
                'stateId' => 20,
            ],
            [
                'title' => 'بیله سوار',
                'stateId' => 19,
            ],
            [
                'title' => 'بیرجند',
                'stateId' => 15,
            ],
            [
                'title' => 'بوکان',
                'stateId' => 9,
            ],
            [
                'title' => 'چابهار',
                'stateId' => 16,
            ],
            [
                'title' => 'چرداول',
                'stateId' => 3,
            ],
            [
                'title' => 'چلگرد',
                'stateId' => 6,
            ],
            [
                'title' => 'چناران',
                'stateId' => 12,
            ],
            [
                'title' => 'چادگان',
                'stateId' => 8,
            ],
            [
                'title' => 'چالوس',
                'stateId' => 23,
            ],
            [
                'title' => 'چایپاره',
                'stateId' => 9,
            ],
            [
                'title' => 'دماوند',
                'stateId' => 30,
            ],
            [
                'title' => 'درگز',
                'stateId' => 12,
            ],
            [
                'title' => 'دره شهر',
                'stateId' => 3,
            ],
            [
                'title' => 'ده دشت',
                'stateId' => 11,
            ],
            [
                'title' => 'دهلران',
                'stateId' => 3,
            ],
            [
                'title' => 'دهاقان',
                'stateId' => 8,
            ],
            [
                'title' => 'دلفان',
                'stateId' => 13,
            ],
            [
                'title' => 'دلیجان',
                'stateId' => 1,
            ],
            [
                'title' => 'دیلم',
                'stateId' => 17,
            ],
            [
                'title' => 'گچساران',
                'stateId' => 11,
            ],
            [
                'title' => 'درچه',
                'stateId' => 8,
            ],
            [
                'title' => 'دولت آباد',
                'stateId' => 8,
            ],
            [
                'title' => 'دامغان',
                'stateId' => 25,
            ],
            [
                'title' => 'داراب',
                'stateId' => 24,
            ],
            [
                'title' => 'داران',
                'stateId' => 8,
            ],
            [
                'title' => 'داورزن',
                'stateId' => 12,
            ],
            [
                'title' => 'اقبالیه',
                'stateId' => 30,
            ],
            [
                'title' => 'اسفراین',
                'stateId' => 27,
            ],
            [
                'title' => 'اسلام شهر',
                'stateId' => 30,
            ],
            [
                'title' => 'فلاورجان',
                'stateId' => 8,
            ],
            [
                'title' => 'فنوج',
                'stateId' => 16,
            ],
            [
                'title' => 'فردیس',
                'stateId' => 14,
            ],
            [
                'title' => 'فریدون شهر',
                'stateId' => 8,
            ],
            [
                'title' => 'فرخ شهر',
                'stateId' => 6,
            ],
            [
                'title' => 'فسا',
                'stateId' => 24,
            ],
            [
                'title' => 'فریدون',
                'stateId' => 8,
            ],
            [
                'title' => 'فریدون کنار',
                'stateId' => 23,
            ],
            [
                'title' => 'فارسان',
                'stateId' => 6,
            ],
            [
                'title' => 'فیروزآباد',
                'stateId' => 24,
            ],
            [
                'title' => 'فومن',
                'stateId' => 5,
            ],
            [
                'title' => 'گراش',
                'stateId' => 24,
            ],
            [
                'title' => 'گلپایگان',
                'stateId' => 8,
            ],
            [
                'title' => 'گنبد کاووس',
                'stateId' => 18,
            ],
            [
                'title' => 'گناباد',
                'stateId' => 12,
            ],
            [
                'title' => 'گرگان',
                'stateId' => 18,
            ],
            [
                'title' => 'گتوند',
                'stateId' => 2,
            ],
            [
                'title' => 'حمیدیه',
                'stateId' => 2,
            ],
            [
                'title' => 'هامون',
                'stateId' => 16,
            ],
            [
                'title' => 'هرسین',
                'stateId' => 4,
            ],
            [
                'title' => 'هشتپر',
                'stateId' => 5,
            ],
            [
                'title' => 'هشت رود',
                'stateId' => 29,
            ],
            [
                'title' => 'ایرانشهر',
                'stateId' => 16,
            ],
            [
                'title' => 'اصفحان',
                'stateId' => 8,
            ],
            [
                'title' => 'جوان رود',
                'stateId' => 4,
            ],
            [
                'title' => 'جنگیه',
                'stateId' => 2,
            ],
            [
                'title' => 'جوین',
                'stateId' => 12,
            ],
            [
                'title' => 'جویبار',
                'stateId' => 23,
            ],
            [
                'title' => 'کاهریز',
                'stateId' => 4,
            ],
            [
                'title' => 'کلاله',
                'stateId' => 18,
            ],
            [
                'title' => 'کنگاور',
                'stateId' => 4,
            ],
            [
                'title' => 'کرج',
                'stateId' => 14,
            ],
            [
                'title' => 'کارون',
                'stateId' => 2,
            ],
            [
                'title' => 'کلیشاد و سودرجان',
                'stateId' => 8,
            ],
            [
                'title' => 'کرمان',
                'stateId' => 28,
            ],
            [
                'title' => 'کرمانشاه',
                'stateId' => 4,
            ],
            [
                'title' => 'خلخال',
                'stateId' => 19,
            ],
            [
                'title' => 'خواص کوه',
                'stateId' => 21,
            ],
            [
                'title' => 'خمین',
                'stateId' => 1,
            ],
            [
                'title' => 'خمینی شهر',
                'stateId' => 8,
            ],
            [
                'title' => 'خرم آباد',
                'stateId' => 13,
            ],
            [
                'title' => 'خرم دره',
                'stateId' => 10,
            ],
            [
                'title' => 'خرم شهر',
                'stateId' => 2,
            ],
            [
                'title' => 'خوی',
                'stateId' => 9,
            ],
            [
                'title' => 'خانسار',
                'stateId' => 8,
            ],
            [
                'title' => 'خارک',
                'stateId' => 17,
            ],
            [
                'title' => 'خاش',
                'stateId' => 16,
            ],
            [
                'title' => 'خور',
                'stateId' => 8,
            ],
            [
                'title' => 'کمیجان',
                'stateId' => 1,
            ],
            [
                'title' => 'کامیاران',
                'stateId' => 20,
            ],
            [
                'title' => 'کاشمر',
                'stateId' => 12,
            ],
            [
                'title' => 'کازرون',
                'stateId' => 24,
            ],
            [
                'title' => 'کیش',
                'stateId' => 22,
            ],
            [
                'title' => 'کوه سفید',
                'stateId' => 28,
            ],
            [
                'title' => 'کوهدشت',
                'stateId' => 13,
            ],
            [
                'title' => 'لنده',
                'stateId' => 11,
            ],
            [
                'title' => 'لنگرود',
                'stateId' => 5,
            ],
            [
                'title' => 'مهدی شهر',
                'stateId' => 25,
            ],
            [
                'title' => 'ماه ریز',
                'stateId' => 21,
            ],
            [
                'title' => 'مهاباد',
                'stateId' => 9,
            ],
            [
                'title' => 'ملارد',
                'stateId' => 30,
            ],
            [
                'title' => 'ممسنی',
                'stateId' => 24,
            ],
            [
                'title' => 'مرند',
                'stateId' => 29,
            ],
            [
                'title' => 'مرو دشت',
                'stateId' => 24,
            ],
            [
                'title' => 'مریوان',
                'stateId' => 20,
            ],
            [
                'title' => 'مشهد',
                'stateId' => 12,
            ],
            [
                'title' => 'مسجد سلیمان',
                'stateId' => 2,
            ],
            [
                'title' => 'مهران',
                'stateId' => 3,
            ],
            [
                'title' => 'میبد',
                'stateId' => 21,
            ],
            [
                'title' => 'میرجاوه',
                'stateId' => 16,
            ],
            [
                'title' => 'مبارکه',
                'stateId' => 8,
            ],
            [
                'title' => 'مهر',
                'stateId' => 24,
            ],
            [
                'title' => 'میناب',
                'stateId' => 22,
            ],
            [
                'title' => 'میاندوآب',
                'stateId' => 9,
            ],
            [
                'title' => 'نجف آباد',
                'stateId' => 8,
            ],
            [
                'title' => 'نقده',
                'stateId' => 9,
            ],
            [
                'title' => 'نشتارود',
                'stateId' => 23,
            ],
            [
                'title' => 'نظرآباد',
                'stateId' => 14,
            ],
            [
                'title' => 'نطنز',
                'stateId' => 8,
            ],
            [
                'title' => 'نکا',
                'stateId' => 23,
            ],
            [
                'title' => 'نیریز',
                'stateId' => 24,
            ],
            [
                'title' => 'نیشابور',
                'stateId' => 12,
            ],
            [
                'title' => 'نیمروز',
                'stateId' => 16,
            ],
            [
                'title' => 'نوشهر',
                'stateId' => 23,
            ],
            [
                'title' => 'نصرت آباد',
                'stateId' => 16,
            ],
            [
                'title' => 'نائین',
                'stateId' => 8,
            ],
            [
                'title' => 'نیک شهر',
                'stateId' => 16,
            ],
            [
                'title' => 'نورآباد',
                'stateId' => 13,
            ],
            [
                'title' => 'نورآباد',
                'stateId' => 24,
            ],
            [
                'title' => 'امیدچه',
                'stateId' => 19,
            ],
            [
                'title' => 'امیدیه',
                'stateId' => 2,
            ],
            [
                'title' => 'ارومیه',
                'stateId' => 9,
            ],
            [
                'title' => 'اوشنویه',
                'stateId' => 9,
            ],
            [
                'title' => 'پردیس',
                'stateId' => 30,
            ],
            [
                'title' => 'پیرانشهر',
                'stateId' => 9,
            ],
            [
                'title' => 'پلدختر',
                'stateId' => 13,
            ],
            [
                'title' => 'پلدشت',
                'stateId' => 9,
            ],
            [
                'title' => 'منجیل',
                'stateId' => 5,
            ],
            [
                'title' => 'پارس آباد',
                'stateId' => 19,
            ],
            [
                'title' => 'پاسارگاد',
                'stateId' => 24,
            ],
            [
                'title' => 'پاوه',
                'stateId' => 4,
            ],
            [
                'title' => 'پیشوا',
                'stateId' => 30,
            ],
            [
                'title' => 'قهدريجان',
                'stateId' => 8,
            ],
            [
                'title' => 'قره ضیاالدین',
                'stateId' => 9,
            ],
            [
                'title' => 'قرچک',
                'stateId' => 30,
            ],
            [
                'title' => 'قصرقند',
                'stateId' => 16,
            ],
            [
                'title' => 'قزوین',
                'stateId' => 26,
            ],
            [
                'title' => 'قشم',
                'stateId' => 22,
            ],
            [
                'title' => 'قدس',
                'stateId' => 30,
            ],
            [
                'title' => 'قم',
                'stateId' => 7,
            ],
            [
                'title' => 'قروه',
                'stateId' => 20,
            ],
            [
                'title' => 'قائن',
                'stateId' => 15,
            ],
            [
                'title' => 'قوچان',
                'stateId' => 12,
            ],
            [
                'title' => 'رفسنجان',
                'stateId' => 28,
            ],
            [
                'title' => 'رشت',
                'stateId' => 5,
            ],
            [
                'title' => 'رازوجرگلان',
                'stateId' => 27,
            ],
            [
                'title' => 'رهنان',
                'stateId' => 8,
            ],
            [
                'title' => 'ری',
                'stateId' => 30,
            ],
            [
                'title' => 'رضوانشهر',
                'stateId' => 5,
            ],
            [
                'title' => 'رباط کریم',
                'stateId' => 30,
            ],
            [
                'title' => 'رستم',
                'stateId' => 24,
            ],
            [
                'title' => 'رومشکان',
                'stateId' => 13,
            ],
            [
                'title' => 'رامهرمز',
                'stateId' => 2,
            ],
            [
                'title' => 'رامشهر',
                'stateId' => 2,
            ],
            [
                'title' => 'راور',
                'stateId' => 28,
            ],
            [
                'title' => 'ریگان',
                'stateId' => 28,
            ],
            [
                'title' => 'رودسر',
                'stateId' => 5,
            ],
            [
                'title' => 'سبزوار',
                'stateId' => 12,
            ],
            [
                'title' => 'سلماس',
                'stateId' => 9,
            ],
            [
                'title' => 'سامان',
                'stateId' => 6,
            ],
            [
                'title' => 'سنندج',
                'stateId' => 20,
            ],
            [
                'title' => 'سقز',
                'stateId' => 20,
            ],
            [
                'title' => 'سرخس',
                'stateId' => 12,
            ],
            [
                'title' => 'سردشت',
                'stateId' => 9,
            ],
            [
                'title' => 'ساری',
                'stateId' => 23,
            ],
            [
                'title' => 'سرپل ذهاب',
                'stateId' => 4,
            ],
            [
                'title' => 'سراب',
                'stateId' => 29,
            ],
            [
                'title' => 'سوادکوه شمالی',
                'stateId' => 23,
            ],
            [
                'title' => 'سلسله',
                'stateId' => 13,
            ],
            [
                'title' => 'سمنان',
                'stateId' => 25,
            ],
            [
                'title' => 'سميرم',
                'stateId' => 8,
            ],
            [
                'title' => 'شهربابک',
                'stateId' => 28,
            ],
            [
                'title' => 'شهرقدیم لار',
                'stateId' => 24,
            ],
            [
                'title' => 'شهرک امام حسن',
                'stateId' => 30,
            ],
            [
                'title' => 'شهرک کلوری',
                'stateId' => 2,
            ],
            [
                'title' => 'شهرک پابدانا',
                'stateId' => 28,
            ],
            [
                'title' => 'شهرجدید اندیشه',
                'stateId' => 30,
            ],
            [
                'title' => 'شهرکرد',
                'stateId' => 6,
            ],
            [
                'title' => 'کلار دشت',
                'stateId' => 23,
            ],
            [
                'title' => 'ابرکوه',
                'stateId' => 21,
            ],
            [
                'title' => 'ابوموسی',
                'stateId' => 22,
            ],
            [
                'title' => 'الیگودرز',
                'stateId' => 13,
            ],
            [
                'title' => 'اندیکا',
                'stateId' => 2,
            ],
            [
                'title' => 'اندیمشک',
                'stateId' => 2,
            ],
            [
                'title' => 'انار',
                'stateId' => 28,
            ],
            [
                'title' => 'ارسنجان',
                'stateId' => 24,
            ],
            [
                'title' => 'گمیشان',
                'stateId' => 18,
            ],
            [
                'title' => 'گالیکش',
                'stateId' => 18,
            ],
            [
                'title' => 'کردکوی',
                'stateId' => 18,
            ],
            [
                'title' => 'مراوه تپه',
                'stateId' => 18,
            ],
            [
                'title' => 'مینودشت',
                'stateId' => 18,
            ],
            [
                'title' => 'رامیان',
                'stateId' => 18,
            ],
            [
                'title' => 'آق قلا',
                'stateId' => 18,
            ],
            [
                'title' => 'علی آباد',
                'stateId' => 18,
            ],
            [
                'title' => 'شهرضا',
                'stateId' => 8,
            ],
            [
                'title' => 'شاهرود',
                'stateId' => 25,
            ],
            [
                'title' => 'شهریار',
                'stateId' => 30,
            ],
            [
                'title' => 'شریف آباد',
                'stateId' => 30,
            ],
            [
                'title' => 'شیراز',
                'stateId' => 24,
            ],
            [
                'title' => 'شادگان',
                'stateId' => 2,
            ],
            [
                'title' => 'شاهین دژ',
                'stateId' => 9,
            ],
            [
                'title' => 'شاهین شهر',
                'stateId' => 8,
            ],
            [
                'title' => 'شیروان',
                'stateId' => 27,
            ],
            [
                'title' => 'شوش',
                'stateId' => 2,
            ],
            [
                'title' => 'شوشتر',
                'stateId' => 2,
            ],
            [
                'title' => 'سیمرغ',
                'stateId' => 23,
            ],
            [
                'title' => 'سیرجان',
                'stateId' => 28,
            ],
            [
                'title' => 'سیروان',
                'stateId' => 3,
            ],
            [
                'title' => 'سله بن',
                'stateId' => 30,
            ],
            [
                'title' => 'سلطانیه',
                'stateId' => 10,
            ],
            [
                'title' => 'سنقر',
                'stateId' => 4,
            ],
            [
                'title' => 'ساوه',
                'stateId' => 1,
            ],
            [
                'title' => 'سوسنگرد',
                'stateId' => 2,
            ],
            [
                'title' => 'طبس',
                'stateId' => 21,
            ],
            [
                'title' => 'طبس',
                'stateId' => 15,
            ],
            [
                'title' => 'تبریز',
                'stateId' => 29,
            ],
            [
                'title' => 'تفرش',
                'stateId' => 1,
            ],
            [
                'title' => 'تافت',
                'stateId' => 21,
            ],
            [
                'title' => 'تکاب',
                'stateId' => 9,
            ],
            [
                'title' => 'تهران',
                'stateId' => 30,
            ],
            [
                'title' => 'تنکابن',
                'stateId' => 23,
            ],
            [
                'title' => 'تربت جام',
                'stateId' => 12,
            ],
            [
                'title' => 'تربت حیدریه',
                'stateId' => 12,
            ],
            [
                'title' => 'بندر ترکمن',
                'stateId' => 18,
            ],
            [
                'title' => 'تاکستان',
                'stateId' => 26,
            ],
            [
                'title' => 'تایباد',
                'stateId' => 12,
            ],
            [
                'title' => 'تیران',
                'stateId' => 8,
            ],
            [
                'title' => 'ورامین',
                'stateId' => 30,
            ],
            [
                'title' => 'ویسیان',
                'stateId' => 13,
            ],
            [
                'title' => 'یاسوج',
                'stateId' => 11,
            ],
            [
                'title' => 'یزد',
                'stateId' => 21,
            ],
            [
                'title' => 'زاهدان',
                'stateId' => 16,
            ],
            [
                'title' => 'زنجان',
                'stateId' => 10,
            ],
            [
                'title' => 'زرند',
                'stateId' => 28,
            ],
            [
                'title' => 'زرین شهر',
                'stateId' => 8,
            ],
            [
                'title' => 'زهک',
                'stateId' => 16,
            ],
            [
                'title' => 'ضیابر',
                'stateId' => 5,
            ],
            [
                'title' => 'زابل',
                'stateId' => 16,
            ],
            [
                'title' => 'ثدین یک',
                'stateId' => 2,
            ],
            [
                'title' => 'آبادانا',
                'stateId' => 3,
            ],
            [
                'title' => 'آبیک',
                'stateId' => 1,
            ],
            [
                'title' => 'آباده',
                'stateId' => 24,
            ],
            [
                'title' => 'آمل',
                'stateId' => 23,
            ],
            [
                'title' => 'آستانه اشرفيه',
                'stateId' => 5,
            ],
            [
                'title' => 'آستارا',
                'stateId' => 5,
            ],
            [
                'title' => 'آزادشهر',
                'stateId' => 18,
            ],
            [
                'title' => 'ایلام',
                'stateId' => 3,
            ],
            [
                'title' => 'گرمسار',
                'stateId' => 25,
            ],
            [
                'title' => 'طالب آباد',
                'stateId' => 30,
            ],
            [
                'title' => 'عجب شیر',
                'stateId' => 29,
            ]
        ]);
    }
}
