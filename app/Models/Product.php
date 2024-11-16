<?php

namespace App\Models;

use App\Traits\PaginateTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use PaginateTrait;

    protected $fillable = ['title', 'description', 'price', 'sku', 'status'];
    protected $hidden = ['pivot'];
    use Searchable;
    protected $guarded = [];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_categories','product_id','category_id');
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
