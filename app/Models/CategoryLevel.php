<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLevel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function Parent(){
        return $this->belongsTo(Category::class,'parentId');
    }
    public function Category(){
        return $this->belongsTo(Category::class,'categoryId');
    }
}
