<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\OrderForm;
use App\Models\Page;
use App\Models\Product;
use App\Models\Size;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function Panel(){
        $users = User::orderBy('id','DESC')->limit(5)->get();
        $orders = Order::orderBy('id','DESC')->paginate(10);
        return view('admin.index',compact(['users','orders']));
    }

    // Contact
    public function Contact(){
        $contacts = Contact::orderBy('id','DESC')->paginate(10);
        return view('admin.conn.contact',compact(['contacts']));
    }
    public function ContactView($id){
        $contact = Contact::where('id',$id)->first();
        return view('admin.conn.viewcontact',compact(['contact']));
    }
    public function Comment(){
        $comments = Comment::orderBy('id','DESC')->paginate(10);
        return view('admin.conn.comment',compact(['comments']));
    }
    public function CommentView($id){
        $comment = Comment::where('id',$id)->first();
        $replies = Comment::where('parent',$id)->get();
        return view('admin.conn.viewcomment',compact(['comment','replies']));
    }
    public function CommentReply(Request $request, $id){
        $comment = Comment::where('id',$id)->first();
        Comment::create([
            'UserId'    =>  user('id'),
            'PostId'    =>  $comment->PostId,
            'Parent'    =>  $id,
            'Comment'   =>  $request->Comment,
            'Author'    =>  user('firstName') .' '. user('lastName'),
            'Phone'     =>  user('phone'),
            'Status'    =>  1,
        ]);
        $message = [
            'type'  => 'success',
            'message'   =>  'پاسخ شما با موفقیت ارسال شد'
        ];
        return redirect()->back()->with($message);
    }

    // Product
    public function SearchProduct(){
        if(isset($_GET['q'])){
            return redirect()->route('product.list',[
                'q' => $_GET['q']
            ]);
        } else {
            return redirect()->route('product.list');
        }
    }

    public function ListProduct(){
        if(isset($_GET['q'])){
            $products = Product::where('title', 'LIKE', '%' . $_GET['q'] . '%' )->paginate(9);
        } else {
            $products = Product::orderBy('id','DESC')->paginate(10);
        }

        return view('admin.product.list',compact(['products']));
    }
    public function AddProduct(){
        $colors = Color::get();
        $sizes = Size::get();
        $category = Category::where('parent',0)->get();
        $subcategories = Category::where('parent',1)->get();
        return view('admin.product.add',compact(['category','subcategories','colors','sizes']));
    }
    public function StoreProduct(Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'Title' => 'required',
            'PrimaryImage'  => 'required',
            'Content'   => 'required'
        ],[
            'Title.required' => 'عنوان الزامی است',
            'PrimaryImage.required' => 'تصویر اصلی الزامی است',
            'Content.required'  =>  'محتوای محصول الزامی است'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if(is_dir('images/'.date('Y-m')) == false){
            mkdir('images/'.date('Y-m'));
        }
        if(is_dir('images/'.date('Y-m').'/'.date('d')) == false){
            mkdir('images/'.date('Y-m').'/'.date('d'));
        }

        // $PrimaryImage = Image::make($request->file('PrimaryImage'));
        // $PrimaryImageName = time().'-'.$PrimaryImage->getClientOriginalName();
        // $PrimaryImage->resize(null, 1000, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // })->fit(1000, 1000)->save('images/'.date('Y-m').'/'.date('d').'/'.$PrimaryImageName);

        // if($request->file('SecondaryImage')){
        //     $SecondaryImage = Image::make($request->file('SecondaryImage'));
        //     $SecondaryImageName = time().'-'.$SecondaryImage->getClientOriginalName();
        //     $SecondaryImage->resize(null, 1000, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     })->fit(1000, 1000)->save('images/'.date('Y-m').'/'.date('d').'/'.$SecondaryImageName);
        // } else {
        //     $SecondaryImageName = null;
        // }
        $createProduct = Product::create([
            "userId"    => user('id'),
            "title" => $request->Title,
            "featured" => ($request->Featured ? true : false),
            "code" => $request->Code,
            "material" => $request->Material,
            "price" => str_replace(',','',$request->Price),
            "disType" => $request->DisType,
            "disAmount" => ($request->DisAmount ? str_replace(',','',$request->DisAmount) : null),
            "description" => $request->Descriptions,
            "content" => $request->Content,
            "status" => ($request->Status ? true : false),
            "stock" => json_encode($request->stock, JSON_UNESCAPED_UNICODE),
            "category" => $request->category,
            "tags" => $request->Tags,
            // "PrimaryImage" => 'images/'.date('Y-m').'/'.date('d').'/'.$PrimaryImageName,
            // "SecondaryImage" => 'images/'.date('Y-m').'/'.date('d').'/'.$SecondaryImageName,
            'uniqueId'  => Str::random(9)
        ]);
        if(is_array($request->file('Gallery'))){
            foreach ($request->file('Gallery') as $key => $value) {
                $name_gen = time().'-'.$value->getClientOriginalName();
                Image::make($value)->save('images/'.date('Y-m').'/'.date('d').'/'.$name_gen);
                Gallery::create([
                    'path'      => 'images/'.date('Y-m').'/'.date('d').'/'.$name_gen,
                    'productId' => $createProduct->id,
                    'userId'    => user('id')
                ]);
            }
        }
        return redirect()->route('product.list')->with(['type'=>'success','message'=>'محصول با موفقیت افزوده شد']);
    }
    public function EditProduct($id){
        $colors = Color::get();
        $sizes = Size::get();

        $product = Product::find($id);
        $gallery = Gallery::where('productId',$id)->get();
        $category = Category::where('parent',0)->get();
        $subcategories = Category::where('parent',$product->MainCategory)->get();
        return view('admin.product.edit',compact(['category','subcategories','product','gallery','colors','sizes']));
    }
    public function StoreEdit(Request $request, $id){
        if(is_dir('images/'.date('Y-m')) == false){
            mkdir('images/'.date('Y-m'));
        }
        if(is_dir('images/'.date('Y-m').'/'.date('d')) == false){
            mkdir('images/'.date('Y-m').'/'.date('d'));
        }
        $product = Product::find($id);
        if($request->file('PrimaryImage')){
            $PrimaryName = time().'-'.$request->file('PrimaryImage')->getClientOriginalName();
            $PrimaryImage = Image::make($request->file('PrimaryImage'));
            $PrimaryImage->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->fit(800, 1000)->save('images/'.date('Y-m').'/'.date('d').'/'.$PrimaryName);
            $PrimaryImageAddress = 'images/'.date('Y-m').'/'.date('d').'/'.$PrimaryName;
        } else {
            $PrimaryImageAddress = $product->primaryImage;
        }
        if($request->file('SecondaryImage')){
            $SecondaryName = time().'-'.$request->file('SecondaryImage')->getClientOriginalName();
            $SecondaryImage = Image::make($request->file('SecondaryImage'));
            $SecondaryImage->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->fit(800, 1000)->save('images/'.date('Y-m').'/'.date('d').'/'.$SecondaryName);
            $SecondaryImageAddress = 'images/'.date('Y-m').'/'.date('d').'/'.$SecondaryName;
        } else {
            $SecondaryImageAddress = $product->secondaryImage;
        }
        $product->update([
            "title" => $request->title,
            "featured" => ($request->featured ? true : false),
            "code" => $request->code,
            "material" => $request->material,
            "Price" => str_replace(',','',$request->price),
            "DisAmount" => str_replace(',','',$request->disAmount),
            "Descriptions" => $request->description,
            "Content" => $request->content,
            "Status" => ($request->status ? true : false),
            "stock" => json_encode($request->stock, JSON_UNESCAPED_UNICODE),
            "category" => $request->category,
            "tags" => $request->Tags,
            "primaryImage" => $PrimaryImageAddress,
            "secondaryImage" => $SecondaryImageAddress,
        ]);

        if($request->Gallery){
            Gallery::where('productId',$id)->delete();
            foreach ($request->file('Gallery') as $key => $value) {
                $name_gen = time().'-'.$value->getClientOriginalName();
                Image::make($value)->save('images/'.date('Y-m').'/'.date('d').'/'.$name_gen);
                Gallery::create([
                    'path'      => 'images/'.date('Y-m').'/'.date('d').'/'.$name_gen,
                    'productId' => $id,
                    'userId'    => user('id')
                ]);
            }
        }
        return redirect()->route('product.list')->with(['type'=>'success','message'=>'محصول با موفقیت ویرایش شد']);
    }

    // Page
    public function ListPage(){
        $pages = Page::where('Status','!=',3)->paginate(10);
        return view('admin.page.list',compact(['pages']));
    }
    public function AddPage(){
        return view('admin.page.add');
    }
    public function StorePage(Request $request){
        $validator = Validator::make($request->all(), [
            'Title' => 'required',
            'Content'   => 'required'
        ],[
            'Title.required' => 'عنوان الزامی است',
            'Content.required'  =>  'محتوای صفحه الزامی است'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        Page::create([
            'Title' => $request->Title,
            'Slug' => $request->Slug,
            'Content' => $request->Content,
            'Status' => ($request->Status ? true : false),
        ]);
        $message = [
            'type'  => 'success',
            'message'   =>  'صفحه با موفقیت افزوده شد'
        ];
        return redirect()->route('page.list')->with($message);
    }
    public function EditPage($id){
        $page = Page::where('id',$id)->first();
        return view('admin.page.edit',compact(['page']));
    }
    public function StorePageEdit(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'Title' => 'required',
            'Content'   => 'required'
        ],[
            'Title.required' => 'عنوان الزامی است',
            'Content.required'  =>  'محتوای صفحه الزامی است'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        Page::where('id',$id)->update([
            'Title' => $request->Title,
            'Slug' => $request->Slug,
            'Content' => $request->Content,
            'Status' => ($request->Status ? true : false),
        ]);
        $message = [
            'type'  => 'success',
            'message'   =>  'صفحه با موفقیت ویرایش شد'
        ];
        return redirect()->route('page.list')->with($message);
    }
    public function DeletePage($id){
        Page::where('id',$id)->update([
            'Status'    => 3
        ]);
    }

    // Slider
    public function Slides(){
        $collection = Slider::get();
        return view('admin.slider.list',compact('collection'));
    }
    public function AddSlide(){
        return view('admin.slider.add');
    }
    public function StoreSlide(Request $request){
        if($request->file('Image')){
            if(is_dir('upload/slider/') == false){
                mkdir('upload/slider/');
            }
            if(is_dir('upload/slider/'.date('Y-m')) == false){
                mkdir('upload/slider/'.date('Y-m'));
            }
            if(is_dir('upload/slider/'.date('Y-m').'/'.date('d')) == false){
                mkdir('upload/slider/'.date('Y-m').'/'.date('d'));
            }
            $name_gen = time().'-'.$request->file('Image')->getClientOriginalName();

            $img = Image::make($request->file('Image'));
            $img->resize(null, 470, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->fit(730, 470)->save('upload/slider/'.date('Y-m').'/'.date('d').'/'.$name_gen);
            $image = 'upload/slider/'.date('Y-m').'/'.date('d').'/'.$name_gen;
        }
        Slider::create([
            'Title'  =>  $request->Title,
            'Image'  =>  $image,
            'Link'  =>  $request->Link,
            'Text2'  =>  $request->Text2,
            'Text3'  =>  $request->Text3,
            'Status' =>  ($request->Status ? true : false),
        ]);
        $message = [
            'type'  => 'success',
            'message' => 'اسلاید با موفقیت افزوده شد'
        ];
        return redirect()->route('slide.list')->with($message);
    }
    public function EditSlide(){

    }
    public function UpdateSlide(Request $request, $id){

    }
    public function DeleteSlide(){

    }

    // Category
    public function ListCategory(){
        $categories = Category::get();
        return view('admin.category.list',compact(['categories']));
    }
    public function StoreCategory(Request $request){
        if($request->id == 0){
            $create = Category::create([
                'name'=>$request->name,
                'parent'=>$request->parent,
                'descriptions'=>$request->descriptions
            ]);
            if($request->type == 1){
                $subs = Category::where('parent',$request->parent)->get();
                $return = [];
                foreach ($subs as $key => $value) {
                    $return[] = '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
                return implode('',$return);
            }elseif($request->type == 2){
                $main = Category::where('parent',0)->get();
                $return = [];
                foreach ($main as $key => $value) {
                    $return[] = '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
                return implode('',$return);
            } else {

                if($create){
                    $message = [
                        'type'  =>  'success',
                        'message'   => 'دسته جدید با موفقیت افزوده شد',
                    ];
                    return redirect()->back()->with($message);
                } else {
                    $message = [
                        'type'  =>  'warning',
                        'message'   => 'خطا در افزودن دسته',
                    ];

                    return redirect()->back()->with($message)->withInput($request->input());
                }
            }
        } else {
            $update = Category::where('id',$request->id)->update([
                'name'  => $request->name,
                'parent'  =>  $request->parent,
                'descriptions'  => $request->descriptions,
            ]);
            if($update){
                $message = [
                    'type'  =>  'success',
                    'message'   => 'دسته با موفقیت ویرایش شد',
                ];
                return redirect()->back()->with($message);

            } else {
                $message = [
                    'type'  =>  'success',
                    'message'   => 'خطا در ویرایش دسته',
                ];
                return redirect()->back()->with($message)->withInput($request->input());

            }
        }
    }
    public function GetCat(){
        if($_GET['type'] == 1){
            $cat = Category::where('id',$_GET['id'])->first();
            if($cat){
                return [
                    'id' => $cat->id,
                    'name' => $cat->name,
                    'descriptions' => $cat->descriptions,
                    'parent'  =>  $cat->parent,
                ];
            } else {
                return null;
            }
        } else {
            $SubCat = Category::where('parent',$_GET['id'])->get();
            $return = [];
            foreach ($SubCat as $key => $value) {
                $return[] = '<option value="'.$value->id.'">'.$value->name.'</option>';
            }
            return implode('',$return);
        }
    }
    public function RemoveCat($id){
        Category::where('id',$id)->delete();
        Category::where('parent',$id)->update([
            'parent'    =>  1,
        ]);
        $message = [
            'type'  =>  'success',
            'message'   =>  'دسته با موفقیت حذف شد و در صورت داشتن زیر دسته، به دسته اصلی انتقال یافت'
        ];
        return redirect()->back()->with($message);
    }


    // Users
    public function UserList(){
        $users = User::paginate(10);
        return view('admin.user.list',compact(['users']));
    }
    public function UserView($id){
        $user = User::where('id',$id)->first();
        $orders = Order::where('userId',$id)->where('status','!=',0)->get();
        $ordersform = OrderForm::where('userId',$id)->get();
        $addresses = Address::where('userId',$id)->get();
        return view('admin.user.view',compact(['user','orders','ordersform','addresses']));
    }

    // Order
    public function OrderList(){
        $orders = Order::paginate(10);
        return view('admin.order.list',compact('orders'));
    }
    public function OrderView($id){
        $order = Order::find($id);
        $ordersform = OrderForm::where('orderId',$id)->get();
        return view('admin.order.view',compact(['order','ordersform']));
    }
    public function OrderUpdate(){
        $order = Order::where('id',$_GET['id'])->first();
        if($_GET['type'] == 1){
            Order::where('id',$_GET['id'])->update([
                'status'  =>  $_GET['val']
            ]);
        } else if($_GET['type'] == 2){
            Order::where('id',$_GET['id'])->update([
                'descriptions'  =>  $_GET['val']
            ]);
        }
    }

    // Transactions
    public function Transactions(){
        $transactions = Transaction::orderBy('id','DESC')->paginate(10);
        return view('admin.transaction.list',compact(['transactions']));
    }
    public function GetTransaction(){
        if(isset($_GET) AND !empty($_GET)){
            if($_GET['id'] != null){
                $transaction = Transaction::where('id',$_GET['id'])->first();
                $orders = OrderForm::where('orderId',$transaction->OrderId)->get();
                $data = [];
                foreach($orders as $item){
                    $data[] = '<a href="'.route('product',['id'=>$item->ProductId]).'" target="_blank"><i class="icons material-icons md-launch"></i> '.$item->Product->Title.'</a>';
                }
                return '
                    <h6 class="mt-15">جزئیات تراکنش</h6>
                    <hr>
                    <h6 class="mb-0">مشتری:</h6>
                    <p>'.$transaction->User->firstName. ' ' .$transaction->User->lastName. '</p>
                    <h6 class="mb-0">تاریخ:</h6>
                    <p>'. \Morilog\Jalali\Jalalian::forge($transaction->created_at)->format('%A، %d %B %Y') .'<span class="text-primary">ساعت</span>'. date('H:i',strtotime($transaction->created_at)).'</p>
                    <h6 class="mb-0">آدرس</h6>
                    <p>'.$transaction->User->State->name.' - '.$transaction->User->city.' - ' .$transaction->User->address.'. کد پستی: ' .$transaction->User->zipcode.'</p>
                    <h6 class="mb-0">کد پرداخت:</h6>
                    <p>'. $transaction->Authority .'</p>
                    <h6 class="mb-0">موبایل:</h6>
                    <p><a href="tel:'. $transaction->User->phone .'">'. $transaction->User->phone .'</a></p>
                    <h6 class="mb-0">محصولات: <a href="'.route('order.view',['id'=>$transaction->OrderId]).'" target="_blank">مشاهده سفارش</a></h6>
                    <p>'.implode("",$data).'</p>
                    <p>نحوه پرداخت: '.GateWay($transaction->GateWay,2).'</p>
                    <p class="h4">'.price($transaction->Price).'</p>
                    <hr>
                    <a class="btn btn-light" href="'.route('transaction.print',['id'=>$transaction->id]).'" target="_blank"> چاپ </a>
                ';
            }
        }
    }
    public function PrintTransaction($id){
        $transaction = Transaction::where('id',$id)->first();
        $order_list = OrderForm::where('orderId',$transaction->OrderId)->get();
        return view('admin.transaction.print',compact(['transaction','order_list']));
    }

    // Settings
    public function Settings(){
        return view('admin.setting.settings');
    }
    public function FiscalSettings(){
        return view('admin.setting.fiscal');
    }
    public function Colors(){

        $colors = Color::get();
        return view('admin.setting.colors',compact(['colors']));
    }
    public function GetColor(){
        $color = Color::where('id',$_GET['id'])->first();
        if($color){
            return [
                'id' => $color->id,
                'name' => $color->Name,
                'code' => $color->Code,
            ];
        } else {
            return null;
        }
    }
    public function StoreColor(Request $request){
        if($request->id == 0){
            $create = Color::create([
                'Name'=>$request->name,
                'Code'=>$request->code,
            ]);
            if($create){
                $message = [
                    'type'  =>  'success',
                    'message'   => 'رنگ جدید با موفقیت افزوده شد',
                ];
                return redirect()->back()->with($message);
            } else {
                $message = [
                    'type'  =>  'warning',
                    'message'   => 'خطا در افزودن رنگ',
                ];

                return redirect()->back()->with($message)->withInput($request->input());
            }
        } else {
            $update = Color::where('id',$request->id)->update([
                'Name'  => $request->name,
                'Code'  =>  $request->code,
            ]);
            if($update){
                $message = [
                    'type'  =>  'success',
                    'message'   => 'رنگ با موفقیت ویرایش شد',
                ];
                return redirect()->back()->with($message);

            } else {
                $message = [
                    'type'  =>  'success',
                    'message'   => 'خطا در ویرایش رنگ',
                ];
                return redirect()->back()->with($message)->withInput($request->input());

            }
        }
    }
    public function ColorRemove($id){
        Color::where('id',$id)->delete();
        $message = [
            'type'  =>  'success',
            'message'   => 'رنگ با موفقیت حذف شد',
        ];
        return redirect()->back()->with($message);
    }
    public function Sizes(){
        $sizes = Size::get();
        return view('admin.setting.sizes',compact(['sizes']));
    }
    public function GetSize(){
        $color = Size::where('id',$_GET['id'])->first();
        if($color){
            return [
                'id' => $color->id,
                'name' => $color->Name,
                'code' => $color->Code,
            ];
        } else {
            return null;
        }
    }
    public function StoreSize(Request $request){
        if($request->id == 0){
            $create = Size::create([
                'Name' => $request->name,
                'Code' => $request->code,
            ]);
            if($create){
                $message = [
                    'type'  =>  'success',
                    'message'   => 'سایز جدید با موفقیت افزوده شد',
                ];
                return redirect()->back()->with($message);
            } else {
                $message = [
                    'type'  =>  'warning',
                    'message'   => 'خطا در افزودن سایز',
                ];

                return redirect()->back()->with($message)->withInput($request->input());
            }
        } else {
            $update = Size::where('id',$request->id)->update([
                'Name'  => $request->name,
                'Code'  =>  $request->code,
            ]);
            if($update){
                $message = [
                    'type'  =>  'success',
                    'message'   => 'سایز با موفقیت ویرایش شد',
                ];
                return redirect()->back()->with($message);

            } else {
                $message = [
                    'type'  =>  'success',
                    'message'   => 'خطا در ویرایش سایز',
                ];
                return redirect()->back()->with($message)->withInput($request->input());

            }
        }
    }
    public function SizeRemove($id){
        Size::where('id',$id)->delete();
        $message = [
            'type'  =>  'success',
            'message'   => 'سایز با موفقیت حذف شد',
        ];
        return redirect()->back()->with($message);
    }
    public function Menus(){
        $menus = Menu::get();
        $mainmenus = Menu::where('main','!=',0)->get();
        return view('admin.setting.menus',compact(['menus','mainmenus']));
    }
    public function GetMenu(){
        $menu = Menu::where('id',$_GET['id'])->first();
        if($menu){
            return [
                'id' => $menu->id,
                'name' => $menu->name,
                'link' => $menu->link,
                'main' => $menu->main,
            ];
        } else {
            return null;
        }
    }

    public function StoreMenu(Request $request){
        if($request->id == 0){
            $create = Menu::create([
                'name' => $request->name,
                'link' => $request->link,
                'main' => $request->main,
            ]);
            if($create){
                $message = [
                    'type'  =>  'success',
                    'message'   => 'فهرست جدید با موفقیت افزوده شد',
                ];
                return redirect()->back()->with($message);
            } else {
                $message = [
                    'type'  =>  'warning',
                    'message'   => 'خطا در افزودن فهرست',
                ];

                return redirect()->back()->with($message)->withInput($request->input());
            }
        } else {
            $update = Menu::where('id',$request->id)->update([
                'name'  => $request->name,
                'link'  =>  $request->link,
                'main'  =>  $request->main,
            ]);
            if($update){
                $message = [
                    'type'  =>  'success',
                    'message'   => 'فهرست با موفقیت ویرایش شد',
                ];
                return redirect()->back()->with($message);

            } else {
                $message = [
                    'type'  =>  'success',
                    'message'   => 'خطا در ویرایش فهرست',
                ];
                return redirect()->back()->with($message)->withInput($request->input());

            }
        }
    }
    public function MenuRemove($id){
        Menu::where('id',$id)->delete();
        $message = [
            'type'  =>  'success',
            'message'   => 'فهرست با موفقیت حذف شد',
        ];
        return redirect()->back()->with($message);
    }


}
