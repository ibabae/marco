<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    protected $fillable = ['category_id', 'attribute_id', 'priority'];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
