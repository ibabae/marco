<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductData extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function Color(){
        return $this->belongsTo(Color::class,'colorId');
    }
    public function Size(){
        return $this->belongsTo(Size::class,'sizeId');
    }
}
