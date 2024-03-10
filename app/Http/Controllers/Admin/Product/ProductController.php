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
        return view('admin.products.create',compact(['title','colors','sizes','categoryArray']));
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
        $productItems = ProductItem::with('Color','Size')->where('productId',$product->id)->get();
        $title = 'ویرایش محصول';
        $colors = Color::get();
        $sizes = Size::get();
        $gallery = Gallery::where('productId',$id)->get();
        $galleryUrls = [];
        $galleryUrlsWithData = [];
        foreach ($gallery as $item) {
            $galleryUrls[] = asset('uploads/'.$item->title);
            $galleryUrlsWithData[] = [
                'downloadUrl' => asset('uploads/'.$item->title),
                'key' => $item->id
            ];
        }
        $categoryArray = $this->GetCategories($product->categoryId);
        $gallery = [];
        return view('admin.products.edit',compact(['product','productItems','title','colors','sizes','categoryArray','galleryUrls','galleryUrlsWithData','gallery']));
    }

    public function update(Request $request, $id)
    {
        return $request->all();
    }

    public function destroy($id)
    {
        //
    }

    // & Categories in recursive
    private function GetCategories($categoryId = 0){
        foreach(Category::get() as $category){
            if(CategoryLevel::where('categoryId',$category->id)->doesntExist()){
                $returnData = $this->GetSubCategories($category,$categoryId);
                $returnData['selected'] = $returnData['selected'] == true ? true : false;
                $categoryArray[] = $returnData;
            }
        }
        return $categoryArray;
    }
    private function GetSubCategories($category,$categoryId){
        $subLevels = CategoryLevel::where('parentId',$category->id)->get();
        $subLevelsArray = [];
        $hasSelected = false;
        foreach($subLevels as $categoryLevel){
            $newCategory = Category::find($categoryLevel->categoryId);
            $subLevelData = $this->GetSubCategories($newCategory,$categoryId);
            $subLevelData['parent'] = $category->id;
            $isSelected = $subLevelData->id == $categoryId ? true : false;
            if($isSelected){
                $hasSelected = true;
            }
            $subLevelData['selected'] = $isSelected;
            $subLevelsArray[] = $subLevelData;

        }
        $category['children'] = $subLevelsArray;
        $category['selected'] = $hasSelected;
        return $category;
    }


}
