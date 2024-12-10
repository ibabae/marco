<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Shop\Category\UpdateCategoryRequest;
use App\Http\Resources\Admin\Shop\Category\IndexCategory;
use App\Models\Category;
use App\Services\Shop\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->categoryService->allCategories();
        return new IndexCategory($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        return $this->categoryService->createCategory($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->categoryService->findCategory($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        return $this->categoryService->updateCategory($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->categoryService->deleteCategory($id);
    }
}
