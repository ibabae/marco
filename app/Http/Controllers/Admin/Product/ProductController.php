<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = "محصولات";
        if(isset($_GET['q'])){
            $products = Product::where('title', 'LIKE', '%' . $_GET['q'] . '%' )->paginate(9);
        } else {
            $products = Product::orderBy('id','DESC')->paginate(10);
        }

        return view('admin.products.list',compact(['products','title']));
    }

    public function create()
    {
        $title = 'افزودن محصول';
        $colors = Color::get();
        $sizes = Size::get();
        return view('admin.products.create',compact(['title','colors','sizes']));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $title = 'ویرایش محصول';
        $colors = Color::get();
        $sizes = Size::get();
        return view('admin.products.edit',compact(['product','title','colors','sizes']));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
