<?php

namespace App\Models;

use App\Traits\PaginateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use PaginateTrait, Searchable, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'discount_price',
        'brand_id',
        'category_id',
        'sku',
        'status',
        'min_order_quantity',
        'max_order_quantity',
        'discount_start_date',
        'discount_end_date',
        'seo_title',
        'seo_description',
    ];
    protected $hidden = ['pivot'];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class, 'product_attributes','product_id','attribute_id')->withPivot('value');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
