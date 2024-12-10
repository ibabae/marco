<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
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
