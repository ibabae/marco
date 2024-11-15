<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryLevel extends Model
{
    use HasFactory;
    protected $fillable = ['parent_id', 'category_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function subLevels()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public $timestamps = false;
}
