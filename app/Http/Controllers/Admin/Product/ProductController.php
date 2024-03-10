<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Category;
use App\Models\CategoryLevel;
use App\Models\Gallery;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $categoryArray = $this->GetCategories();
        // dd($categoryArray);
        return view('admin.products.create',compact(['title','colors','sizes','categoryArray']));
    }

    private function GetCategories(){
        foreach(Category::get() as $category){
            if(CategoryLevel::where('categoryId',$category->id)->doesntExist()){
                $categoryArray[] = $this->GetSubCategories($category);
            }
        }
        return $categoryArray;
    }
    private function GetSubCategories($category){
        $subLevels = CategoryLevel::where('parentId',$category->id)->get();
        $subLevelsArray = [];
        foreach($subLevels as $categoryLevel){
            $newCategory = Category::find($categoryLevel->categoryId);
            $subLevelData = $this->GetSubCategories($newCategory);
            $subLevelData['parent'] = $category->id;
            $subLevelsArray[] = $subLevelData;

        }
        $category['children'] = $subLevelsArray;
        return $category;
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validated();
        $product = Product::create([
            'userId' => User('id'),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'featured' => $request->featured ? 1 : 0,
            'code' => $request->code,
            'material' => $request->material,
            'price' => str_replace(',','',$request->price),
            'disPrice' => $request->disPrice ? str_replace(',','',$request->disPrice) : 0,
            'tags' => $request->tags,
            'uniqueId' => Str::random(6)
        ]);
        $primaryImage = $request->file('primaryImage');
        $primaryImageName = 'image-primary-'.$product->id.'-'.time().'.'.$primaryImage->getClientOriginalExtension(); // You can customize the image name if needed
        $primaryImage->move(public_path('uploads'), $primaryImageName);
        Gallery::create([
            'title' => $primaryImageName,
            'productId' => $product->id,
            'userId' => User('id'),
        ]);
        $product->update([
            'primaryImage' => $primaryImageName
        ]);
        $secondaryImage = $request->file('secondaryImage');
        $secondaryImageName = 'image-secondary-'.$product->id.'-'.time().'.'.$secondaryImage->getClientOriginalExtension(); // You can customize the image name if needed
        $secondaryImage->move(public_path('uploads'), $secondaryImageName);
        Gallery::create([
            'title' => $secondaryImageName,
            'productId' => $product->id,
            'userId' => User('id'),
        ]);
        $product->update([
            'secondaryImage' => $secondaryImageName
        ]);
        foreach ($request->file('images') as $key => $image) {
            $imageName = 'image-'.$key.'-'.$product->id.'-'.time().'.'.$image->getClientOriginalExtension(); // You can customize the image name if needed
            $image->move(public_path('uploads'), $imageName);
            Gallery::create([
                'title' => $imageName,
                'productId' => $product->id,
                'userId' => User('id'),
            ]);
        }
        foreach($request->stock as $stock){
            ProductItem::create([
                'productId' => $product->id,
                'colorId' => $stock['color'],
                'sizeId' => $stock['size'],
                'count' => $stock['count'],
            ]);
        }

        // $categories = [];
        // foreach($request->category as $key => $category){
        //     $categoryData = $key;
        //     $subLevels = [];
        //     foreach($category as $subKey => $row){
        //         // $theCategory = Category::find($subKey);
        //         // return $theCategory;
        //         $subLevels[] = $subKey;
        //     }
        //     // return $subLevels;
        //     $categoryData['subLevels'] = $subLevels;
        //     $categories[] = $categoryData;
        // }

        return response()->json([
            'message' => $request->all(),
        ], 200);
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
