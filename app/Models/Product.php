<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function MainCat(){
        return $this->hasOne(Category::class, 'id','MainCategory');
    }

    public function SubCat(){
        return $this->hasOne(Category::class, 'id','SubCategory');
    }

}
