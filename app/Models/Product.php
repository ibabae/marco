<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function MainCat(){
        return $this->hasOne(Category::class, 'id','MainCategory');
    }

    public function SubCat(){
        return $this->hasOne(Category::class, 'id','SubCategory');
    }

    public function gallery(){
        return $this->hasMany(Gallery::class, 'productId');
    }

    public function items(){
        return $this->hasMany(ProductItem::class, 'productId');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'postId')
            ->where('status',1)
            ->where('parent',0);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'material' => $this->material,
        ];

        // $array = $this->toArray();

        // return $array;

    }


}
