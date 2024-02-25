<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function Main(){
        return $this->hasOne(Category::class, 'id','main');
    }

    public function getParentAttribute(){
        $parent = CategoryLevel::where('categoryId',$this->id);
        if($parent->exists()){
            $theParent = $parent->first();
            $category = Category::find($theParent->parentId);
            $parentName = $category->title;
        } else {
            $parentName = 'بدون والد';
        }
        return $parentName;
    }

    public function getCountProductsAttribute(){
        return Product::where('categoryId',$this->id)->count();
    }

    protected $appends = ['parent','countProducts'];
}
