<?php

namespace App\Repositories\Shop;

use App\Models\Tag;
use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;

class TagRepo extends RepositoryBaseClass implements RepositoryInterface
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function all(){
        return $this->pagination($this->tag);
    }

    public function create(array $data){
        return $this->tag->firstOrCreate($data);
    }

    public function find($id){
        return $this->tag->findOrFail($id);
    }

    public function update(array $data, $id){
        $this->find($id)->update($data);
    }

    public function delete($id){
        $this->find($id)->delete();
    }

}
