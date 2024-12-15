<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\StoreProductRequest;
use App\Http\Requests\Admin\Shop\UpdateProductRequest;
use App\Http\Resources\Admin\Shop\Product\IndexProduct;
use App\Http\Resources\Admin\Shop\Product\ShowProduct;
use App\Http\Resources\DestroyResource;
use App\Services\Shop\ProductService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ){}
    /**
     * @OA\Get(
     *     path="/api/admin/shop/product",
     *     tags={"Product"},
     *     summary="Get list of products",
     *     description="Only accessible for authenticated users",
     *     security={{"passport":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of products"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function index()
    {
        // DB::enableQueryLog();
        $data = $this->productService->allProducts();
        // dd(DB::getQueryLog());
        return new IndexProduct($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $this->productService->createProduct($request->validated());
        return (new ShowProduct($data))->additional([
            'message' => __('shop/product.product')." ".__('lang.successfully')." ".__('lang.created')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->productService->findProduct($id);
        return new ShowProduct($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $data = $this->productService->updateProduct($request->validated(), $id);
        return (new ShowProduct($data))->additional([
            'message' => __('shop/product.product')." ".__('lang.successfully')." ".__('lang.updated')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productService->deleteProduct($id);
        return new DestroyResource([
            'model' => __('shop/product.product')
        ]);
    }
}
