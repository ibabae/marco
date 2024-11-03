<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreCategoryRequest;
use App\Http\Requests\Product\UpdateCategoryRequest;
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
        $selectArray = [];
        $selectArray[] = [
            'id' => '',
            'title' => 'بدون والد',
        ];
        foreach(Category::get() as $item){
            $selectArray[] = [
                'id' => $item->id,
                'title' => $item->title,
            ];
        }
        return response()->json([
            'success' => true,
            'select' => $selectArray,
        ], 200);
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
        $arrayData = [];
        $selectArray = [];
        $selectArray[] = [
            'id' => 0,
            'title' => 'بدون والد',
        ];
        foreach(Category::get() as $item){
            $arrayData[] = '
                <tr>
                    <th scope="row">'.$item->id.'</th>
                    <td>'.$item->title.'</td>
                    <td><span class="badge bg-primary">'.$item->Parent["title"].'</span></td>;
                    <td><span class="badge bg-info">'.$item->countProducts.'</span></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route('admin.shop.category.edit',$item->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating category-delete-warning" href="'.route('admin.shop.category.destroy',$item->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
            $selectArray[] = [
                'id' => $item->id,
                'title' => $item->title,
            ];
        }
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'table' => implode($arrayData),
            'select' => $selectArray,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selectArray = [];
        $hasSelected = false;
        $selectArray[] = [
            'id' => 0,
            'title' => 'بدون والد',
            'selected' => false,
        ];
        foreach(Category::whereNot('id',$id)->get() as $item){
            $selected = CategoryLevel::where('categoryId',$id)->where('parentId',$item->id)->exists();
            if($selected) $hasSelected = true;
            $selectArray[] = [
                'id' => $item->id,
                'title' => $item->title,
                'selected' => $selected,
            ];
        }
        if($hasSelected == false){
            $selectArray[0]['selected'] = true;
        }
        return response()->json([
            'success' => true,
            'data' => Category::findOrFail($id),
            'select' => $selectArray,
            'route' => route('admin.shop.category.update',$id)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $request->validated();
        $category = Category::findOrFail($id);
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        if($request->parentId){
            CategoryLevel::updateOrCreate([
                'categoryId' => $id,
            ],[
                'categoryId' => $id,
                'parentId' => $request->parentId,
            ]);
        }

        $arrayData = [];
        $selectArray = [];
        $selectArray[] = [
            'id' => 0,
            'title' => 'بدون والد',
            'selected' => false,
        ];
        foreach(Category::get() as $item){
            $arrayData[] = '
                <tr>
                    <th scope="row">'.$item->id.'</th>
                    <td>'.$item->title.'</td>
                    <td><span class="badge bg-primary">'.$item->Parent["title"].'</span></td>
                    <td><span class="badge bg-info">'.$item->countProducts.'</span></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route("admin.shop.category.edit",$item->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating category-delete-warning" href="'.route("admin.shop.category.destroy",$item->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
            $selectArray[] = [
                'id' => $item->id,
                'title' => $item->title,
            ];
        }
        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'table' => implode($arrayData),
            'select' => $selectArray,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $arrayData = [];
        $selectArray = [];
        $selectArray[] = [
            'id' => 0,
            'title' => 'بدون والد',
            'selected' => false,
        ];
        foreach(Category::get() as $item){
            $arrayData[] = '
                <tr>
                    <th scope="row">'.$item->id.'</th>
                    <td>'.$item->title.'</td>
                    <td><span class="badge bg-primary">'.$item->Parent["title"].'</span></td>
                    <td><span class="badge bg-info">'.$item->countProducts.'</span></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route("admin.shop.category.edit",$item->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating category-delete-warning" href="'.route("admin.shop.category.destroy",$item->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
            $selectArray[] = [
                'id' => $item->id,
                'title' => $item->title,
            ];
        }
        return response()->json([
            'success' => true,
            'message' => 'Category successfully removed',
            'table' => implode($arrayData),
            'select' => $selectArray,
        ]);
    }
}
