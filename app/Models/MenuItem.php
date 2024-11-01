<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function parent()
    {
        return $this->hasOneThrough(
            MenuItem::class,
            MenuLevel::class,
            'item_id',      // Foreign key on the menu_levels table...
            'id',           // Foreign key on the menu_items table...
            'id',           // Local key on the MenuItem table...
            'parent_id'     // Local key on the menu_levels table...
        );
    }

    public function items(){
        return $this->belongsToMany(MenuItem::class, 'menu_levels', 'parent_id', 'item_id');
    }
}
