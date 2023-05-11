<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function Account(){
        $title = 'حساب کاربری';
        return view('user.account',compact(['title']));
    }
    public function AccountOrder(){
        $title = 'سفارشات';
        $orders = Order::where('UserId',user('id'))->get();
        return view('user.orders',compact(['orders','title']));
    }
    public function AccountViewOrder($id){
        $title = '';
        $order = Order::where('UserId',user('id'))->where('id',$id)->first();
        if($order){
            return view('user.orders',compact(['orders','title']));
        } else {
            return redirect()->route('home');
        }
    }
    public function OrderTrack(){
        $title = 'پیگیری سفارش';
        return view('user.track',compact(['title']));
    }
    public function Address(){
        $title = 'آدرس ها';
        $addresses = Address::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        $states = State::orderBy('name_fa','ASC')->get();
        return view('user.address',compact(['title','addresses','states']));
    }
    public function AddAddress(){
        $title = 'افزودن آدرس';
        $states = State::orderBy('name_fa','ASC')->get();
        return view('user.addressadd',compact(['title','states']));
    }
    public function AddressPost(Request $request){
        $validator = Validator::make($request->all(), [
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
        ],[
            'state.required' => 'استان الزامی است',
            'city.required' => 'شهر الزامی است',
            'address.required' => 'آدرس الزامی است',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Address::create([
            'user_id'=>Auth::id(),
            'state'=>$request->state,
            'city'=>$request->city,
            'address'=>$request->address,
            'zipcode'=>$request->zipcode,
            'pelak'=>$request->pelak,
            'primary'=>($request->primary ? 1 : 0),
        ]);
        return redirect()->route('account.address');
    }
    public function EditAddress($id){
        $title = 'ویرایش آدرس';
        $states = State::orderBy('name_fa','ASC')->get();
        $address = Address::where('id',$id)->where('user_id',Auth::id())->first();
        if($address){
            return view('user.addressedit',compact(['title','states','address']));
        }else{
            return redirect()->back();
        }
    }
    public function UpdateAddress(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
        ],[
            'state.required' => 'استان الزامی است',
            'city.required' => 'شهر الزامی است',
            'address.required' => 'آدرس الزامی است',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if($request->primary){
            Address::where('user_id',Auth::id())->update([
                'primary'=>0,
            ]);
        }
        Address::where('id',$id)->update([
            'state'=>$request->state,
            'city'=>$request->city,
            'address'=>$request->address,
            'zipcode'=>$request->zipcode,
            'pelak'=>$request->pelak,
            'primary'=>($request->primary ? 1 : 0),
        ]);
        return redirect()->route('account.address');
    }
    public function AccountProfile(){
        $title = 'جزئیات حساب';
        $user = User::where('id',Auth::id())->first();
        return view('user.profile',compact(['title','user']));
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
