<?php

namespace App\Repositories\Shop;

use App\Models\Category;
use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;

class CategoryRepo extends RepositoryBaseClass implements RepositoryInterface
{

    public function __construct(
        protected Category $category
    )
    {}

    public function all(){
        return $this->category->whereDoesntHave('parent')->with('subLevels')->get();
    }

    public function create(array $data){
        return $this->category->create($data);
    }

    public function find($id){
        return $this->category->with('parent','attributes')->find($id);
    }

    public function update(array $data, $id){
        return $this->category->update($data);
    }

    public function delete($id){
        $this->find($id)->delete();
    }

}