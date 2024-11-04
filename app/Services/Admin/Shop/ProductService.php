<?php

namespace App\Services\Admin\Shop;

use App\Repositories\Admin\Shop\ProductRepo;
use App\Services\ServiceBaseClass;

class ProductService extends ServiceBaseClass
{
    public function __construct(
        protected ProductRepo $repo,
    ){}

    public function allProducts(){
        return $this->repo->all();
    }

    public function createProduct(array $data){
        return $this->repo->create($data);
    }

    public function findProduct($id){
        return $this->repo->find($id);
    }

    public function updateProduct(array $data, $id){
        return $this->repo->update($data, $id);
    }

    public function deleteProduct($id){
        return $this->repo->delete($id);
    }
}
