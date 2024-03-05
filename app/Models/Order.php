<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    // order 0 
    public function User(){
        return $this->hasOne(User::class, 'id','UserId');
    }

    public function Transaction(){
        return $this->hasOne(Transaction::class, 'OrderId','id');
    }
}
