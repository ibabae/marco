<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];
    protected $fillable = ['title', 'description'];
    public $timestamps = false;

    public function subLevels()
    {
        return $this->hasManyThrough(
            related: Category::class,
            through: CategoryLevel::class,
            firstKey: 'parent_id',
            secondKey: 'id',
            localKey: 'id',
            secondLocalKey: 'category_id'
        )->with('subLevels');
    }

    public function parent()
    {
        return $this->belongsToMany(Category::class, 'category_levels', 'category_id', 'parent_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'category_attributes')->withPivot('priority');
    }

}
