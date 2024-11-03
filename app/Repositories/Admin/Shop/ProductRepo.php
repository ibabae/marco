<?php

namespace App\Repositories\Admin\Shop;

use App\Models\Product;
use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;

class ProductRepo extends RepositoryBaseClass implements RepositoryInterface
{
    public function all(){
        $products = Product::search(request('search'))->paginate();

        return $products;
    }

    public function create(array $data){

    }

    public function find($id){

    }

    public function update(array $data, $id){

    }

    public function delete($id){

    }

}
