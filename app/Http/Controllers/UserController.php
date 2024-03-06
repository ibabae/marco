<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Models\City;
use App\Models\OrderItem;
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
        return view('website.user.account',compact(['title']));
    }
    public function AccountOrder(){
        $title = 'سفارشات';
        $orders = Order::where('userId',user('id'))->get();
        return view('website.user.orders',compact(['orders','title']));
    }
    public function AccountViewOrder($id){
        $title = 'سفارشات';
        $order = Order::where('userId',user('id'))->where('id',$id)->first();
        if($order){
            $orderItems = OrderItem::where('orderId',$order->id)->get();
            return view('website.user.orderitems',compact(['orderItems','title']));
        } else {
            return redirect()->route('home');
        }
    }
    public function OrderTrack(){
        $title = 'پیگیری سفارش';
        return view('website.user.track',compact(['title']));
    }
    public function Address(){
        $title = 'آدرس ها';
        $addresses = Address::where('userId',Auth::id())->orderBy('id','DESC')->get();
        return view('website.user.address',compact(['title','addresses']));
    }
    public function AddAddress(){
        $title = 'افزودن آدرس';
        return view('website.user.addressadd',compact(['title']));
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
            return response()->json([
                'success' => false,
                'message' => $request->errors()
            ], 422);
        }
        $state = State::firstWhere('name','LIKE','%'.$request->state.'%');
        if(!$state){
            $state = State::create([
                'name' => $request->state,
            ]);
        }
        $city = City::firstWhere('name','LIKE','%'.$request->city.'%');
        if(!$city){
            $city = City::create([
                'name' => $request->city,
                'stateId' => $state->id
            ]);
        }
        if($request->primary){
            foreach(Address::where('userId',Auth::id())->get() as $address){
                $address->update([
                    'primary' => 0,
                ]);
            }
        }
        Address::create([
            'userId' => Auth::id(),
            'stateId'=> $state->id,
            'cityId' => $city->id,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'number' => $request->pelak,
            'primary' => $request->primary ? 1 : 0,
        ]);
        $data = [];
        foreach(Address::where('userId', Auth::id())->get() as $address){
            $data[] = $address;
        }
        return response()->json([
            'success' => true,
            'message' => 'آدرس افزوده شد',
            'data' => $data,
        ]);
    }
    public function EditAddress($id){
        $title = 'ویرایش آدرس';
        $address = Address::where('id',$id)->where('userId',Auth::id())->first();
        if($address){
            return view('website.user.addressedit',compact(['title','address']));
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
            foreach(Address::where('userId',Auth::id())->get() as $address){
                $address->update([
                    'primary' => 0,
                ]);
            }
        }
        $state = State::firstWhere('name','LIKE','%'.$request->state.'%');
        if(!$state){
            $state = State::create([
                'name' => $request->state,
            ]);
        }
        $city = City::firstWhere('name','LIKE','%'.$request->city.'%');
        if(!$city){
            $city = City::create([
                'name' => $request->city,
                'stateId' => $state->id
            ]);
        }
        Address::where('id',$id)->update([
            'stateId' => $state->id,
            'cityId' => $city->id,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'number' => $request->number,
            'primary' => ($request->primary ? 1 : 0),
        ]);
        return redirect()->route('account.address')->with([
            'type' => 'success',
            'message' => 'آدرس با موفقیت به روز رسانی شد'
        ]);
    }
    public function RemoveAddress($id){
        $address = Address::where('userId',Auth::id())->where('id',$id)->first();
        if(!$address){
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'آدرس یافت نشد'
            ]);
        }
        if($address->primary == 1){
            $findAddress = Address::where('userId',Auth::id())->orderBy('id','desc')->first();
            if($findAddress){
                $findAddress->update([
                    'primary' => 1
                ]);
            }
        }
        $address->delete();
        return redirect()->back()->with([
            'type' => 'info',
            'message' => 'آدرس با موفقیت حذف شد'
        ]);
    }
    public function AccountProfile(){
        $title = 'جزئیات حساب';
        $user = User::where('id',Auth::id())->first();
        return view('website.user.profile',compact(['title','user']));
    }
    public function ProfileUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
        ],[
            'firstName.required' => 'نام الزامی است',
            'lastName.required' => 'نام خانوادگی الزامی است',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }
        $user = User::find(Auth::id());
        $user->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email
        ]);
        return response()->json([
            'success' => false,
            'message' => 'پروفایل با موفقیت به روز رسانی شد'
        ], 200);
}
    public function Logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
