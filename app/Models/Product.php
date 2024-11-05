<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    protected $guarded = [];

    public $timestamps = false;

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
