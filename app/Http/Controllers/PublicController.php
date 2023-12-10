<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Exeption;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\OrderForm;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;


class PublicController extends Controller
{
    //
    public function test(){
        // SendSms('09115152620','123456');
    }
    public function Home(){
        $products = Product::get();
        $products_featured = Product::where('Featured',1)->get();
        $descriptions = Setting('descriptions');
        $slider = Slider::where('Status',1)->get();
        return view('home',compact(['products','products_featured','descriptions','slider']));
    }
    public function Auth(){
        $title = 'ورود / ثبت نام';
        return view('auth',compact(['title']));
    }
    public function SignIn(){
        return view('sign-in');
    }
    public function SignInPost(Request $request){

    }
    public function SignUp(){
        return view('sign-up');
    }
    public function SignUpPost(Request $request){

    }
    public function Blog(){

    }
    public function About(){
        return view('about');
    }
    public function Contact(){
        return view('contact');
    }
    public function Page($id){
        $page = Page::where('id',$id)->first();
        $title  = $page->Title;
        return view('page',compact(['page','title']));
    }

    public function Pay($id){
        $transaction = Transaction::where('id',$id)->first();
        // $response = zarinpal()
        //     ->amount($transaction->Price) // مبلغ تراکنش
        //     ->request()
        //     ->description('transaction info') // توضیحات تراکنش
        //     ->callbackUrl(route('verify')) // آدرس برگشت پس از پرداخت
        //     ->mobile($transaction->User->phone) // شماره موبایل مشتری - اختیاری
        //     ->email($transaction->User->email) // ایمیل مشتری - اختیاری
        //     ->send();
        $invoice = (new Invoice)->amount($transaction->Price);
        return Payment::callbackUrl(route('pay.verify'))->purchase($invoice,function($driver, $transactionId) use ($transaction) {
            $transaction->update([
                'authority' => $transactionId
            ]);
        })->pay()->render();
    }
    public function Verify(Request $request){
        try {
            $authority = $request->input('Authority'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
            $transaction = Transaction::where('Authority',$authority)->first();
            $receipt = Payment::amount($transaction->Price)->transactionId($authority)->verify();

            // if (!$response->success()) {
            //     $message = $response->error()->message();
            //     $type = 'warning';
            //     if($status == 'NOK'){
            //         $status = 0;
            //     }
            //     Transaction::where('Authority',$authority)->update([
            //         'Status'    => $status
            //     ]);
            // } else {

            //     // دریافت هش شماره کارتی که مشتری برای پرداخت استفاده کرده است
            //     // $response->cardHash();
            //     // دریافت شماره کارتی که مشتری برای پرداخت استفاده کرده است (بصورت ماسک شده)
            //     // $response->cardPan();

                $transaction->update([
                    'Status'    =>  1,
                ]);

                Order::where('id',$transaction->OrderId)->update([
                    'Status'    =>  3
                ]);

            //     // پرداخت موفقیت آمیز بود
            //     // دریافت شماره پیگیری تراکنش و انجام امور مربوط به دیتابیس
            //     // $response->referenceId();
            //     $type = 'success';
            //     $message = 'پرداخت موفقیت آمیز بود';
            //     session(['cart'=>null]);
            //     session()->save();
            // }
            // $message = [
            //     'type'  => $type,
            //     'message'   => $message
            // ];
            // return redirect()->route('account.orders')->with($message);
            $message = [
                'success' => true,
                'message' => 'پرداخت موفقیت آمیز بود',
            ];

        } catch (InvalidPaymentException $exception) {
            $message = [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
        return redirect()->route('drivers.dashboard')->with($message);
    }

    public function ContactStore(Request $request){
        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'Phone' => 'required',
            'Subject' => 'required',
            'Message' => 'required',
            'captcha' => 'required|captcha'
        ],[
            'Name.required' => 'نام الزامی است',
            'Phone.required' => 'شماره همراه الزامی است',
            'Subject.required' => 'موضوع الزامی است',
            'Message.required' => 'پیغام الزامی است',
            'captcha.required' => 'کد کپچا الزامی است',
            'captcha.captcha' => 'کد کپچا اشتباه است',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if(substr($request->Phone,0,1) != '0'){
            $request->merge(['Phone' => '0'.$request->Phone]);
        }

        $findToday = Contact::where('phone',$request->Phone)->orderBy('id','DESC')->first();
        if($findToday AND date('Y-m-d',strtotime($findToday->created_at)) == date('Y-m-d')){
            $message = [
                'type'  => 'warning',
                'message'   =>  'سقف پیغام روزانه یک عدد است'
            ];
            return redirect()->back()->with($message);
        }
        Contact::create([
            'Name'      => $request->Name,
            'Phone'     => $request->Phone,
            'Subject'   => $request->Subject,
            'Message'   => $request->Message,
            'Location'  => $request->Location,
        ]);
        $message = [
            'type'  => 'success',
            'message'   =>  'پیغام شما با موفقت ارسال شد'
        ];
        return redirect()->back()->with($message);
    }
    public function Search(){
        if(isset($_GET['q'])){
            return redirect()->route('products',[
                'q' => $_GET['q']
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function Products(){
        if(isset($_GET['q'])){
            $products = Product::where('Title', 'LIKE', '%' . $_GET['q'] . '%' )->paginate(9);
        } else {
            $products = Product::paginate(1);
        }
        return view('shop.products',compact(['products']));
    }
    public function AuthPost(Request $request){
        if(substr($request->phone,0,1) != '0'){
            $request->merge(['phone' => '0'.$request->phone]);
        }
        $request->merge([
            'password' => $request->phone.'1234'
        ]);
        if($request->type == 'register'){
            $users = User::where('phone',$request->phone)->where('email',$request->email)->get();
            if($users->count() != 1){
                User::create([
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                ]);
                $credentials = $request->only('phone', 'password');
                if (Auth::attempt($credentials, true)) {
                    return 'success';
                } else {
                    return 'warning';
                }
            } else {
                // کاربر وجود دارد
                return 'exist';
            }
        } else {
            $users = User::where('phone',$request->phone)->get();
            if($users->count() == 1){
                $credentials = $request->only('phone', 'password');
                if (Auth::attempt($credentials, true)) {
                    return 'success';
                } else {
                    return 'warning';
                }
            } else {
                return 'notexist';
            }
        }
    }

    public function Product($id){
        $product = Product::where('id',$id)->first();
        $gallery = Gallery::where('ProductId',$id)->get();
        $comments = Comment::where('PostId',$id)->where('status',1)->where('parent',0)->get();
        $title = $product->Title;
        $descriptions = $product->Descriptions;
        return view('shop.product',compact(['product','gallery','comments','title','descriptions']));
    }
    public function Stock(){
        $product = Product::where('id',$_GET['id'])->first();
        if($_GET['type'] == 1){
            // اگر انتخاب رنگ بود این خروجی
            $output = [];
            foreach (json_decode($product->Stock ,true) as $key => $item) {
                if(str_replace('#','',$item['color']) == $_GET['color']){
                    $order_forms = OrderForm::where('ProductId',$product->id)->where('Color','#'.$_GET['color'])->where('Size',$item['size'])->get();
                    $theCount = 0;
                    foreach ($order_forms as $order) {
                        $the_order = Order::where('id',$order->OrderId)->first();
                        if($the_order->Status != 0){
                            $theCount += $order->Count;
                        }
                    }
                    if(intval($item['count']) - $theCount == 0){


                    } else {
                        $output[] = ['size'=> $item['size']];
                    }
                }
            }
            $sizes = [];
            if(count($output) >= 1){
                foreach($output as $item){
                    $sizes[] = '<li class="ms-1"><a href="javascript:void(0)" class="SizeItem">'.$item['size'].'</a></li>';
                }
            } else {
                $sizes[] = '<span class="badge bg-warning text-dark">سایز های این رنگ موجود نیست</span>';
            }
            return implode('',$sizes);
        } else {
            // اگر انتخاب سایز بود این خروجی
            $output = 0;
            foreach (json_decode($product->Stock ,true) as $key => $item) {
                if($item['color'] == '#'.$_GET['color'] AND $item['size'] == $_GET['size']){
                    $order_forms = OrderForm::where('ProductId',$product->id)->where('Color','#'.$_GET['color'])->where('Size',$item['size'])->get();
                    $theCount = 0;
                    foreach ($order_forms as $key => $order) {
                        $the_order = Order::where('id',$order->OrderId)->first();
                        if($the_order->Status != 0){
                            $theCount += $order->Count;
                        }
                    }
                    $output = $item['count'] - $theCount;
                }
            }
            // dd($output);
            return $output;
        }
    }
    public function AddToCart(){
        $product = Product::where('id',$_GET['id'])->first();

        if($product){
            if($_GET['color'] AND $_GET['size'] AND $_GET['count']){
                $cart = session('cart');
                $new_array = [
                    'id'    =>  $_GET['id'],
                    'color' =>  $_GET['color'],
                    'size'  =>  $_GET['size'],
                    'count' =>  $_GET['count'],
                ];
                $add = true;
                if($cart != null){
                    foreach($cart as $item){
                        if($item['id'] == $_GET['id'] AND $item['color'] == $_GET['color'] AND $item['size'] == $_GET['size']){
                            $add = false;
                        }
                    }
                    if($add != false){
                        array_push($cart, $new_array);
                        session(['cart'=>$cart]);
                        $message = [
                            'type'  =>  'success',
                            'text'   =>  'محصول به سبد اضافه شد'
                        ];
                    } else {
                        $message = [
                            'type'  =>  'warning',
                            'text'   =>  'محصول در سبد موجود است'
                        ];
                    }
                } else {
                    session(['cart'=>[
                        $new_array
                    ]]);
                    $message = [
                        'type'  =>  'success',
                        'text'   =>  'محصول به سبد اضافه شد'
                    ];
                }
                session()->save();
                $return = [];
                $total = 0;
                foreach (session('cart') as $key => $item) {
                    $product = Product::where('id',$item['id'])->first();
                    if($product->DisAmount != NULL){
                        $price = xprice($product->Price) - $product->DisAmount;
                    } else {
                        $price = xprice($product->Price);
                    }
                    $total =+ $price * $item['count'];
                    $return[] = '
                        <li>
                            <div class="shopping-cart-img">
                                <a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'"><img alt="'.Setting('title').'" src="'.asset($product->PrimaryImage).'"></a>
                            </div>
                            <div class="shopping-cart-title">
                                <h4><a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'">'.$product->Title.'</a></h4>
                                <h3><span>'.$item['count'].' × </span>'.price($price).'</h3>
                                رنگ: <span style="width:15px;height:15px;background-color:'.$item['color'].'; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: '.$item['size'].'
                            </div>
                            <div class="shopping-cart-delete">
                                <a href="javascript:void(0);" data-id="'.$product->id.'" data-color="'.$item['color'].'" data-size="'.$item['size'].'"><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li>
                    ';
                }
                return ['message'=>$message, 'data'=>implode('',$return),'total'=>price($total)];
            } else {
                $message = [
                    'type'  =>  'warning',
                    'text'   =>  'لطفا مشخصات محصول را انتخاب کنید'
                ];
                return ['message'=>$message];
            }
        } else {
            return false;
        }
    }
    public function GetCart(){
        if(session('cart')){
            $total = 0;
            foreach (session('cart') as $key => $item) {
                $product = Product::where('id',$item['id'])->first();
                if($product->DisAmount != NULL){
                    $price = xprice($product->Price) - $product->DisAmount;
                } else {
                    $price = xprice($product->Price);
                }

                $total += $price * $item['count'];
                // id, count, color, size
                $return3[] = '
                    <tr>
                        <td class="image product-thumbnail"><img src="'.asset($product->PrimaryImage).'" alt="#"></td>
                        <td>
                            <h5><a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'">'.$product->Title.'</a></h5>
                            <p class="font-xs">رنگ: <span style="width:15px;height:15px;background-color:'.$item['color'].'; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: '.$item['size'].'</p>
                            <span class="product-qty">x '.$item['count'].'</span>
                        </td>
                        <td>'.price($price * $item['count']).'</td>
                    </tr>
                ';

                $return2[] = '
                    <tr>
                        <td class="image product-thumbnail"><img src="'.asset($product->PrimaryImage).'" alt="#"></td>
                        <td class="product-des product-name">
                            <h class="product-name"><a data-id="'.$product->id.'" data-size="'.$item['size'].'" data-color="'.$item['color'].'" href="'.route('product',['id'=>$product->id,'title'=>$product->Title]).'">'.$product->Title.'</a></h5>
                            <p class="font-xs">رنگ: <span style="width:15px;height:15px;background-color:'.$item['color'].'; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: <span class="fw-bolder">'.$item['size'].'</span></p>
                        </td>
                        <td class="price" data-title="قیمت"><span>'.price($price).'</span></td>
                        <td class="text-center" data-title="تعداد">
                            <center>
                                <div class="num-block skin-2 border rounded-3 p-2">
                                    <div class="row num-in px-1">
                                        <div class="col-3 px-1"><center><span class="plus"></span></center></div>
                                        <div class="col-6 px-0"><input type="text" class="in-num p-0 count" max="'.'" value="'.$item['count'].'" readonly=""></div>
                                        <div class="col-3 px-1"><center><span class="minus dis"></span></center></div>
                                    </div>
                                </div>
                            </center>
                        </td>
                        <td class="text-right" data-title="مجموع">
                            <span>'.price($price *$item['count']).' </span>
                        </td>
                        <td class="action shopping-cart-delete" data-title="حذف"><a href="#" class="text-muted" data-id="'.$product->id.'" data-size="'.$item['size'].'" data-color="'.$item['color'].'"><i class="fi-rs-trash"></i></a></td>
                    </tr>
                ';
                $return[] = '
                    <li>
                        <div class="shopping-cart-img">
                            <a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'"><img alt="'.Setting('title').'" src="'.asset($product->PrimaryImage).'"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'">'.$product->Title.'</a></h4>
                            <h3><span>'.$item['count'].' × </span>'.price($price).'</h3>
                            رنگ: <span style="width:15px;height:15px;background-color:'.$item['color'].'; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: '.$item['size'].'
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="javascript:void(0);" data-id="'.$product->id.'" data-color="'.$item['color'].'" data-size="'.$item['size'].'"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>
                ';
            }
            $return3[] = '
                <tr>
                    <th>جمع سفارش</th>
                    <td class="product-subtotal" colspan="2">'.price($total).'</td>
                </tr>
                <tr>
                    <th>هزینه ارسال</th>
                    <td colspan="2"><em>رایگان</em></td>
                </tr>
                <tr>
                    <th>جمع کل</th>
                    <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">$280.00</span></td>
                </tr>
            ';
            return ['data'=>implode('',$return),'data2'=>implode('',$return2),'data3'=>implode('',$return3),'total'=>price($total)];
        } else {
            return null;
        }

    }
    public function RemoveItem(){
        if(session('cart')){
            $cart = session('cart');
            $list = [];
            foreach($cart as $item){
                if($item['id'] == $_GET['id'] AND $item['size'] == $_GET['size'] AND $item['color'] == '#'.$_GET['color']){
                } else {
                    $list[] = $item;
                }
            }
            session(['cart'=>$list]);
            session()->save();
            $return = [];
            $return2 = [];
            $total = 0;
            foreach (session('cart') as $key => $item) {
                $product = Product::where('id',$item['id'])->first();
                if($product->DisAmount != NULL){
                    $price = xprice($product->Price) - $product->DisAmount;
                } else {
                    $price = xprice($product->Price);
                }
                $total = $total + ($price * $item['count']);
                $return2[] = '
                    <tr>
                        <td class="image product-thumbnail"><img src="'.asset($product->PrimaryImage).'" alt="#"></td>
                        <td class="product-des product-name">
                            <h5 class="product-name"><a data-id="'.$product->id.'" data-size="'.$item['size'].'" data-color="'.$item['color'].'" href="'.route('product',['id'=>$product->id,'title'=>$product->Title]).'">'.$product->Title.'</a></h5>
                            <p class="font-xs">رنگ: <span style="width:15px;height:15px;background-color:'.$item['color'].'; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: '.$item['size'].'</p>
                        </td>
                        <td class="price" data-title="قیمت"><span>'.price($price).'</span></td>
                        <td class="text-center" data-title="تعداد">
                            <center>
                                <div class="num-block skin-2 border rounded-3 p-2">
                                    <div class="row num-in px-1">
                                        <div class="col-3 px-1"><center><span class="plus"></span></center></div>
                                        <div class="col-6 px-0"><input type="text" class="in-num p-0 count" max="'.'" value="'.$item['count'].'" readonly=""></div>
                                        <div class="col-3 px-1"><center><span class="minus dis"></span></center></div>
                                    </div>
                                </div>
                            </center>
                        </td>
                        <td class="text-right" data-title="Cart">
                            <span>'.price($price*$item['count']).' </span>
                        </td>
                        <td class="action shopping-cart-delete" data-title="حذف"><a href="#" class="text-muted" data-id="'.$product->id.'" data-size="'.$item['size'].'" data-color="'.$item['color'].'"><i class="fi-rs-trash"></i></a></td>
                    </tr>
                ';
                $return[] = '
                    <li>
                        <div class="shopping-cart-img">
                            <a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'"><img alt="'.Setting('title').'" src="'.asset($product->PrimaryImage).'"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'">'.$product->Title.'</a></h4>
                            <h3><span>'.$item['count'].' × </span>'.price($price).'</h3>
                            رنگ: <span style="width:15px;height:15px;background-color:'.$item['color'].'; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: '.$item['size'].'
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="javascript:void(0);" data-id="'.$product->id.'" data-color="'.$item['color'].'" data-size="'.$item['size'].'"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>
                ';
            }
            $message = [
                'type'=>'success',
                'text'=>'محصول از سبد حذف شد'
            ];
            return ['data'=>implode($return),'data2'=>implode($return2),'total'=>price($total),'message'=>$message];
        }
    }
    public function UpdateCart(){
        $data = [];
        foreach($_GET['cart'] as $row){
            $product = Product::where('id',$row['id'])->first();
            foreach (json_decode($product->Stock ,true) as $key => $item) {
                if($item['color'] == $row['color'] AND $item['size'] == $row['size']){
                    $order_forms = OrderForm::where('ProductId',$row['id'])
                                            ->where('Color',$row['color'])
                                            ->where('Size',$row['size'])
                                            ->get();
                    $theCount = 0;
                    foreach ($order_forms as $key => $order) {
                        $the_order = Order::where('id',$order->OrderId)->first();
                        if($the_order->Status != 0){
                            $theCount += $order->Count;
                        }
                    }
                    $itemCount = intval($item['count']) - $theCount;
                    if(intval($row['count']) > $itemCount){
                        //
                        foreach(session('cart') as $cart){
                            if($cart['id'] == $row['id'] AND $cart['color'] == $row['color'] AND $cart['size'] == $row['size']){
                                $data[] = $cart;
                            }
                        }
                    } else {
                        $data[] = $row;
                    }
                }
            }
        }
            // return $data;
        session(['cart'=>$data]);
        session()->save();
        $total = 0;
        foreach (session('cart') as $key => $item) {
            $product = Product::where('id',$item['id'])->first();
            if($product->DisAmount != NULL){
                $price = xprice($product->Price) - $product->DisAmount;
            } else {
                $price = xprice($product->Price);
            }

            $total = $total + ($price * $item['count']);
            // id, count, color, size
            $return2[] = '
                <tr>
                    <td class="image product-thumbnail"><img src="'.asset($product->PrimaryImage).'" alt="#"></td>
                    <td class="product-des product-name">
                        <h5 class="product-name"><a data-id="'.$product->id.'" data-size="'.$item['size'].'" data-color="'.$item['color'].'" href="'.route('product',['id'=>$product->id,'title'=>$product->Title]).'">'.$product->Title.'</a></h5>
                        <p class="font-xs">رنگ: <span style="width:15px;height:15px;background-color:'.$item['color'].'; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: <span class="fw-bolder">'.$item['size'].'</span></p>
                    </td>
                    <td class="price" data-title="قیمت"><span>'.price($price).'</span></td>
                    <td class="text-center" data-title="تعداد">
                        <center>
                            <div class="num-block skin-2 border rounded-3 p-2">
                                <div class="row num-in px-1">
                                    <div class="col-3 px-1"><center><span class="plus"></span></center></div>
                                    <div class="col-6 px-0"><input type="text" class="in-num p-0 count" max="'.'" value="'.$item['count'].'" readonly=""></div>
                                    <div class="col-3 px-1"><center><span class="minus dis"></span></center></div>
                                </div>
                            </div>
                        </center>
                    </td>
                    <td class="text-right" data-title="Cart">
                        <span>'.price($price*$item['count']).' </span>
                    </td>
                    <td class="action shopping-cart-delete" data-title="حذف"><a href="#" class="text-muted" data-id="'.$product->id.'" data-size="'.$item['size'].'" data-color="'.$item['color'].'"><i class="fi-rs-trash"></i></a></td>
                </tr>
            ';
            $return[] = '
                <li>
                    <div class="shopping-cart-img">
                        <a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'"><img alt="'.Setting('title').'" src="'.asset($product->PrimaryImage).'"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="'.route("product",['id'=>$product->id,'title'=>$product->Title]).'">'.$product->Title.'</a></h4>
                        <h3><span>'.$item['count'].' × </span>'.price($price).'</h3>
                        رنگ: <span style="width:15px;height:15px;background-color:'.$item['color'].'; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: '.$item['size'].'
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="javascript:void(0);" data-id="'.$product->id.'" data-color="'.$item['color'].'" data-size="'.$item['size'].'"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
            ';
        }
        return ['data'=>implode('',$return),'data2'=>implode('',$return2),'total'=>price($total)];
    }
    public function Sort(Request $request){
        if($request->type == 'PriceToHigh'){
            if($request->q != null){
                $products = Product::where('Status',1)->where('Title', 'LIKE', '%' . $request->q . '%' )->orderBy('Price','ASC')->get();
            } else {
                $products = Product::where('Status',1)->orderBy('Price','ASC')->get();
            }
        } else if($request->type == 'PriceToLow'){

        } else if($request->type == 'Date'){

        } else {
            return $request->type;
        }
    }
    public function Comment(Request $request, $id){
        if(Auth::check()){
            $name = user('firstName') . ' ' . user('lastName');
            $phone = user('phone');
            $userId = user('id');
        } else {
            $validator = Validator::make($request->all(), [
                'Name' => 'required',
                'Phone' => 'required',
                'captcha' => 'required|captcha'
            ],[
                'Name.required' => 'نام الزامی است',
                'Phone.required' => 'شماره همراه الزامی است',
                'captcha.required' => 'کد کپچا الزامی است',
                'captcha.captcha' => 'کد کپچا اشتباه است',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if(substr($request->Phone,0,1) != '0'){
                $request->merge(['Phone' => '0'.$request->Phone]);
            }
            $name = $request->Name;
            $phone = $request->Phone;
            $userId = '0';
        }
        Comment::create([
            'UserId'    => $userId,
            'PostId'    => $id,
            'Comment'   => $request->Comment,
            'Author'    => $name,
            'Phone'     => $phone,
            'Job'       => $request->Job,
        ]);
        $message = [
            'type'  =>  'info',
            'message'   =>  'دیدگاه شما با موفقیت ارسال شد، پس از تأیید منتشر خواهد شد'
        ];
        return redirect()->back()->with($message);
    }
}
