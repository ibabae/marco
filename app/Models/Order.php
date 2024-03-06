<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Status 0 = Submited
    // Status 1 = Paid
    // Status 2 = Sent
    // Status 3 = Back
    public function User(){
        return $this->hasOne(User::class, 'id','UserId');
    }

    public function Transaction(){
        return $this->hasOne(Transaction::class, 'OrderId','id');
    }
}
