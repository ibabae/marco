<?php

namespace App\Services\Shop;

use App\Models\Attribute;
use App\Repositories\Shop\ProductRepo;
use App\Services\FreePikService;
use App\Services\ServiceBaseClass;
use App\Services\Shop\AttributeService;
use App\Services\Shop\TagService;
use App\Services\UnsplashService;
use Illuminate\Support\Facades\DB;

class ProductService extends ServiceBaseClass
{
    public function __construct(
        protected ProductRepo $productRepo,
        protected TagService $tagService,
        protected AttributeService $attributeService,
        protected FreePikService $freepikService,
        protected UnsplashService $unsplashService,
    ){}

    public function allProducts(){
        return $this->productRepo->all();
    }

    public function createProduct(array $data){
        DB::beginTransaction();
        try {
            $product = $this->productRepo->create($data);
            $this->syncProductDependencies($product, $data);

            DB::commit();
            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function findProduct($id){
        return $this->productRepo->find($id);
    }

    public function updateProduct(array $data, $id){
        DB::beginTransaction();
        try {
            $this->productRepo->update($data, $id);
            $product = $this->productRepo->find($id);
            $this->syncProductDependencies($product, $data);

            DB::commit();
            return $this->productRepo->find($id);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    public function deleteProduct($id){
        return $this->productRepo->delete($id);
    }

    private function syncProductDependencies($product, $data){
        $product->categories()->sync($data['categories']);
        $tags = collect($data['tags'])->map(function ($tagName) {
            return $this->tagService->createTag(['name'=>$tagName])->id;
        });
        $product->tags()->sync($tags);
        $product->attributes()->sync($this->attributeService->createAttribute($data));
    }

}
