<?php

namespace App\Services\Shop;

use App\Repositories\Shop\TagRepo;
use App\Services\ServiceBaseClass;

class TagService extends ServiceBaseClass
{
    public function __construct(
        protected TagRepo $tagRepo
    ){}

    public function allTags(){
        return $this->tagRepo->all();
    }

    public function createTag(array $data){
        return $this->tagRepo->create($data);
    }

    public function findTag($id){
        return $this->tagRepo->find($id);
    }

    public function updateTag(array $data, $id){
        return $this->tagRepo->update($data, $id);
    }

    public function deleteTag($id){
        return $this->tagRepo->delete($id);
    }
    
}
