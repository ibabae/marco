<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
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
        return view('website.shop.cart',compact(['title']));
    }
    public function Checkout(){
        $title = "ثبت سفارش و پرداخت";
        $addresses = Address::where('userId',Auth::id())->get();
        return view('website.shop.checkout',compact(['title','addresses']));
    }
    public function Wishlist(){
        return view('shop.wishlist');
    }
    public function Payout(Request $request){
        if(Auth::check()){
            $validator = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
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
            $order = Order::where('userId',User('id'))->first();
            $price = 0;
            foreach(OrderItem::where('orderId',$order->id)->get() as $item){
                $price += $item->price;
            }
            Transaction::create([
                'userId'    =>  user('id'),
                'orderId'   =>  $order->id,
                'price'     =>  $price,
                'payType'   =>  $request->payment_option,
                'gateWay'   =>  1,
                'status'    =>  0,
            ]);
            return redirect()->route('redirect',['id'=>$order->id]);
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
