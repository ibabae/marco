<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreCategoryRequest;
use App\Models\Category;
use App\Models\CategoryLevel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'دسته بندی ها';
        $categories = Category::get();
        return view('admin.products.category.list',compact(['title','categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();
        $create = Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        if($request->parentId){
            CategoryLevel::create([
                'categoryId' => $create->id,
                'parentId' => $request->parentId
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with([
            'success' => true,
            'message' => 'Size successfully removed'
        ]);
    }
}
