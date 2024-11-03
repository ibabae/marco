<?php

use App\Models\Setting;

if(!function_exists('Setting')){
    function Setting($value){
        $setting = Setting::firstWhere('code',$value);
        if($setting){
            return $setting->value;
        }else{
            return null;
        }
    }
}

if (!function_exists('ConvertNumber')) {
    function ConvertNumber($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
        return $englishNumbersOnly;
    }
}
