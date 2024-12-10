<?php

namespace App\Services\Shop;

use App\Repositories\Shop\CategoryRepo;
use App\Services\ServiceBaseClass;
use Illuminate\Support\Facades\DB;

class CategoryService extends ServiceBaseClass
{
    public function __construct(
        protected CategoryRepo $categoryRepo
    ){}

    public function allCategories(){
        return $this->categoryRepo->all();
    }

    public function createCategory(array $data){
        DB::beginTransaction();
        try {
            $category = $this->categoryRepo->create($data);
            $category->attributes()->sync($data['attributes']);
            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    public function findCategory($id){
        return $this->categoryRepo->find($id);
    }

    public function updateCategory(array $data, $id){
        DB::beginTransaction();
        try {

            $this->categoryRepo->update($data, $id);
            $category = $this->categoryRepo->find($id);
            $category->attributes()->sync($data['attributes']);
            DB::commit();
            return $this->categoryRepo->find($id);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteCategory($id){
        return $this->categoryRepo->delete($id);
    }
}
