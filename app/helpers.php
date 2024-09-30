<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PhoneVerification;
use App\Models\Product;
use App\Models\User;
use App\Models\Setting;
use App\Models\State;
use App\Models\City;
use App\Models\ProductItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if(!function_exists('user')){
    function user($value = ''){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            return $user->$value;
        } else {
            return null;
        }
    }
}
if(!function_exists('Setting')){
    function Setting($value){
        $setting = Setting::where('code',$value)->first();
        if($setting){
            return $setting->value;
        }else{
            return null;
        }
    }
}
if(!function_exists('price')){
    function price($val, $type = 1){
        switch (Setting('unit')) {
            case 1:
                $price_format = ' ﮬ.ت';
                return number_format($val / 1000) . $price_format;
            case 2:
                $price_format = ' ﮬ.ر';
                return number_format($val * 10) . $price_format;
            case 3:
                $price_format = ' دلار';
                return number_format($val) . $price_format;
        }
    }
}
if(!function_exists('xprice')){
    function xprice($value){
        return (Setting('profit') / 100) * $value + $value;
    }
}
if(!function_exists('Available')){
    function Available($productId, $colorId, $sizeId){
        $product = Product::find($productId);
        $productCount = ProductItem::
            where('productId', $product->id)->
            where('colorId', $colorId)->
            where('sizeId', $sizeId)->
            sum('count');
        $orderItems = OrderItem::
            where('productId', $product->id)->
            where('colorId', $colorId)->
            where('sizeId', $sizeId)->
            get();
        // return $orderItems;
        $soldCount = 0;
        foreach($orderItems as $orderItem){
            $order = Order::where('id',$orderItem->orderId)->first();
            $statuses = [1,2,3];
            if(in_array($order->status,$statuses)){
                $soldCount += $orderItem->count;
            }
        }
        return $productCount - $soldCount;
    }
}
if(!function_exists('OrderStatus')){
    function OrderStatus($status){
        return match ($status) {
            1 => '<div class="badge rounded-pill alert-success">دریافت شده</div>',
            2 => '<div class="badge rounded-pill alert-info">ارسال شده</div>',
            3 => '<div class="badge rounded-pill alert-primary">در صف ارسال</div>',
            default => '<div class="badge rounded-pill alert-warning">در انتظار پرداخت</div>',
        };
    }
}
if(!function_exists('TransStatus')){
    function TransStatus($status){
        return match ($status) {
            1 => '<div class="badge rounded-pill alert-success">پرداخت شده</div>',
            default => '<div class="badge rounded-pill alert-warning">ناموفق</div>',
        };
    }
}
if(!function_exists('State')){
    function State($id){
        $state = State::find($id);
        return $state->name;
    }
}
if(!function_exists('City')){
    function City($id){
        $state = City::find($id);
        return $state->name;
    }
}
if(!function_exists('PayType')){
    function PayType($id){
        switch ($id) {
            case '1':
                $return = 'کارت به کارت';
            case '2':
                $return = 'پرداخت با چک';
            case '3':
                $return = 'پرداخت آنلاین';
            default:
                $return = null;
        }
        return $return;
    }
}
if(!function_exists('Badge')){
    function Badge($id){
        $product = Product::find($id);
        // <span class="hot">داغ</span>
        // <span class="new">New</span>
        // <span class="best">Best Sell</span>
        // <span class="sale">Sale</span>
        // <span class="hot">-30%</span>
    }
}
if(!function_exists('reloadCaptcha')){
    function reloadCaptcha(){
        return response()->json(['captcha'=> captcha_img()]);
    }
}
if(!function_exists('excerpt')){
    function excerpt($value,$limit){
        $array = explode(' ', $value);
        if(count($array) > 1  ){
            $return = [];
            for ($i=0; $i < $limit; $i++) {
                $return[] = $array[$i];
            }
            return implode(" ",$return).'...';
        } else {
            return $value;
        }
    }
}
if(!function_exists('generateVerificationCode')){
    function generateVerificationCode() {
        return mt_rand(100000, 999999);
    }

    // Sendin
}
if(!function_exists('sendVerificationCode')){
    function sendVerificationCode($phone, $verificationCode) {
        PhoneVerification::create([
            'phone' => $phone,
            'code' => $verificationCode
        ]);
        $parameters = [
            [
            //     'name' => 'TEXT',
            //     'value' => "*محتوای این پیامک را در اختیار دیگرام قرار ندهید*",
            // ],[
                'name' => 'CODE',
                'value' => "$verificationCode",
            ],
        ];
        $parameters = json_encode($parameters,true);
        $smsdata = '{"mobile":"0'.$phone.'","templateId":400012,"parameters":'.$parameters.'}';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sms.ir/v1/send/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $smsdata,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: text/plain',
                'x-api-key: '.env("SMS_IR_API")
            ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);
    }

}
if(!function_exists('resend')){
    function resend($phone){
        $verification = PhoneVerification::where('phone',$phone);
        if(count($verification->get()) >= 3){
            $startDate = new DateTime($verification->first()->created_at);
            $diff = $startDate->diff(new DateTime(date('Y-m-d H:i:s')));
            if($diff->i < 10){
                return ['10',10 - $diff->i];
            } else {
                foreach(PhoneVerification::where('phone',$phone)->get() as $verf){
                    $verf->delete();
                }
                return '1';
            }
        } else {
            if($verification->exists()){
                $startDate = new DateTime($verification->first()->created_at);
                $diff = $startDate->diff(new DateTime(date('Y-m-d H:i:s')));
                if($diff->i >= 1){
                    return '1';
                } else {
                    return false;
                }
            } else {
                return '1';
            }
        }
    }
}
if(!function_exists('phone')){
    function phone($value){
        if(substr($value,0,1) == 0){
            $value = substr($value,0,11);
        }
        $part1 = substr($value, 0, 4);
        $part2 = substr($value, 4, 3);
        $part3 = substr($value, 7, 4);
        return $part1.'-'.$part2.'-'.$part3;
    }
}
if(!function_exists('Profit')){
    function Profit(){
        $orders = Order::where('status','!=',0)->get();
        $total = 0;
        foreach($orders as $order){
            $order_form = OrderItem::where('orderId',$order->id)->get();
            foreach($order_form as $item){
                $product = Product::find($item->productId);
                $total += ($item->price - $product->price) * $item->count;
            }
        }
        return $total;
    }
}
if(!function_exists('Orders')){
    function Orders(){
        $orders = Order::where('status','!=',0)->get();
        $total = 0;
        foreach ($orders as $key => $order) {
            $total += $order->price;
        }
        return $total;
    }
}
if(!function_exists('Products')){
    function Products(){
        $products = Product::get();
        return $products->count();
    }
}
if(!function_exists('Primary')){
    function Primary($type){
        return match ($type) {
            1 => 'پیشفرض',
            2 => '',
        };
    }
}
if(!function_exists('Categories')){
    function Categories(){
        $categories = Category::get();
        return $categories->count();
    }
}
if(!function_exists('GateWay')){
    function GateWay($value,$type = 1){
        return match ($type) {
            1 => match ($value) {
                    1 => '
                    <div class="icontext">
                        <img class="icon border" src="' . asset('/images/zarinpal.png') . '" alt="Payment">
                        <span class="text text-muted">ZarinPal</span>
                    </div>
                ',
                    default => '
                    <div class="icontext">
                        <img class="icon border" src="' . asset('/images/payir.svg') . '" alt="Payment">
                        <span class="text text-muted">PayIr</span>
                    </div>
                ',
                },
            default => match ($value) {
                    1 => 'زرین پال',
                    default => 'پی آی آر',
                },
        };
    }
}

