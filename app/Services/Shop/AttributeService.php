<?php

namespace App\Services\Shop;

use App\Repositories\Shop\AttributeRepo;
use App\Services\ServiceBaseClass;

class AttributeService extends ServiceBaseClass
{
    public function __construct(
        protected AttributeRepo $attributeRepo
    ){}

    public function allAttributes(){
        return $this->attributeRepo->all();
    }

    public function createAttribute(array $data){
        return $this->attributeRepo->create($data);
    }

    public function findAttribute($id){
        return $this->attributeRepo->find($id);
    }

    public function updateAttribute(array $data, $id){
        return $this->attributeRepo->update($data, $id);
    }

    public function deleteAttribute($id){
        return $this->attributeRepo->delete($id);
    }
}
