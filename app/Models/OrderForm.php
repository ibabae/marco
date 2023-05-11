<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'UserId',
        'OrderId',
        'ProductId',
        'Count',
        'Size',
        'Color',
        'Price',
    ];
    public function Product(){
        return $this->hasOne(Product::class, 'id','ProductId');
    }
}
