<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderForm;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    //
    public function Cart(){
        $title = "سبد خرید";
        return view('shop.cart',compact(['title']));
    }
    public function Checkout(){
        $title = "ثبت سفارش و تصویه";
        $states = DB::table('states')->orderBy('name','ASC')->get();
        return view('shop.checkout',compact(['states','title']));
    }
    public function Wishlist(){
        return view('shop.wishlist');
    }
    public function Payout(Request $request){
        if(Auth::check()){

            $validator = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
                'state' => 'required',
                'address' => 'required',
                'city' => 'required',
                'zipcode' => 'required',
                'phone' => 'required',
            ],[
                'firstName.required' => 'نام الزامی است',
                'lastName.required' => 'نام خانوادگی الزامی است',
                'state.required' => 'استان الزامی است',
                'address.required' => 'آدرس الزامی است',
                'city.required' => 'شهر الزامی است',
                'zipcode.required' => 'کدپستی الزامی است',
                'phone.required' => 'شماره همراه الزامی است',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            User::where('id',user('id'))->update([
                'firstName'     =>  $request->firstName,
                'lastName'     =>  $request->lastName,
                'cname'     =>  $request->cname,
                'state'     =>  $request->state,
                'address'   =>  $request->address,
                'city'      =>  $request->city,
                'zipcode'   =>  $request->zipcode,
                'phone'     =>  $request->phone,
            ]);
            $CartList = session('cart');
            $total = 0;
            if(is_array($CartList) <= 0){
                $message = [
                    'type'  =>  'warning',
                    'message'  =>  'سبد خرید شما خالی است'
                ];
                return redirect()->back()->with($message);
            } else {
                foreach($CartList as $item){
                    $product = Product::where('id',$item['id'])->first();
                    if($product->DisAmount != NULL){
                        $price = xprice($product->Price) - $product->DisAmount;
                    } else {
                        $price = xprice($product->Price);
                    }

                    $total += $price * $item['count'];
                }
                Order::create([
                    'userId'    =>  user('id'),
                    'price' =>  $total,
                    'profit'    =>  Setting('profit'),
                    'coupon'    =>  null,
                    'descriptions'  =>  $request->descriptions,
                ]);
                $orderId = DB::getPdo()->lastInsertId();
                foreach($CartList as $item){
                    $product = Product::where('id',$item['id'])->first();
                    if($product->DisAmount != NULL){
                        $price = xprice($product->Price) - $product->DisAmount;
                    } else {
                        $price = xprice($product->Price);
                    }

                    OrderForm::create([
                        'userId'    =>  user('id'),
                        'orderId'    =>  $orderId,
                        'productId' =>  $item['id'],
                        'count' =>  $item['count'],
                        'size'  =>  $item['size'],
                        'color' =>  $item['color'],
                        'price' =>  $price,
                    ]);
                }
                Transaction::create([
                    'UserId'    =>  user('id'),
                    'OrderId'   =>  $orderId,
                    'Price'     =>  $total,
                    'PayType'   =>  $request->payment_option,
                    'GateWay'   =>  1,
                    'TrackId'   =>  '',
                    'Status'    =>  0,
                ]);
                return redirect()->route('redirect',['id'=>$orderId]);
            }
        } else {
            $message = [
                'type'  => 'warning',
                'message'   =>  'لطفا وارد شوید یا ثبت نام کنید'
            ];
            return redirect()->back()->with($message);
        }
    }
    public function Redirect($id){
        $trans = Transaction::where('UserId',user('id'))->where('OrderId',$id)->first();
        if($trans->PayType == 3){
            return redirect()->route('pay',['id'=>$trans->id]);
        } else {
            return view('redirect',compact(['trans']));
        }
    }
    public function Verify($id = ''){
        if($id != ''){
            $trans = Transaction::where('id',$id)->first();
            if($trans->UserId == user('id')){
                Transaction::where('id',$id)->update([
                    'Status'    => 2,
                    'TrackId'   => $_GET['trackId']
                ]);
                $message = [
                    'type'  =>  'success',
                    'message'   =>  'تراکنش با موفقیت ثبت شد. در انتظار تأیید بمانید'
                ];
                return redirect()->route('account')->with($message);
            } else {
                // تراکنش برای این کاربر نیست
            }
        }
    }
}
