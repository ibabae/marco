<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $hidden = ['pivot'];
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes')->withPivot('value');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_attributes')->withPivot('priority');
    }

}
