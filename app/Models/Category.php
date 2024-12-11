<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public static function booted() {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    protected $fillable = ['title', 'description','parent_id'];
    public $timestamps = false;

    public function subLevels()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function subLevel()
    {
        return $this->subLevels()->with(['subLevel']);
    }



    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'category_attributes')->withPivot('priority');
    }

}
