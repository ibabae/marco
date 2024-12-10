<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuItem extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    public static function booted() {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    protected $guarded = [];

    public $timestamps = false;

    public function subLevels()
    {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id');
    }

    public function subLevel()
    {
        return $this->subLevels()->with('subLevel');
    }
}
