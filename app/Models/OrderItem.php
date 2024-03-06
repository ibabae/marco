<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Product(){
        return $this->belongsTo(Product::class, 'productId');
    }

    public function Color(){
        return $this->belongsTo(Color::class, 'colorId');
    }
    public function Size(){
        return $this->belongsTo(Size::class, 'sizeId');
    }

}
