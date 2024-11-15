<?php

namespace App\Repositories\Shop;

use App\Models\Product;
use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;

class ProductRepo extends RepositoryBaseClass implements RepositoryInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function all(){
        return $this->pagination($this->product);
    }

    public function create(array $data){
        return $this->product->create($data);
    }

    public function find($id){
        return $this->product->findOrFail($id);
    }

    public function update(array $data, $id){
        $this->find($id)->update($data);
    }

    public function delete($id){
        $this->find($id)->delete();
    }

}
