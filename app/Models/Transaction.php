<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'UserId',
        'OrderId',
        'Price',
        'PayType',
        'GateWay',
        'Authority',
        'TrackId',
        'CardHash',
        'CardPan',
        'Status',
    ];
    public function User(){
        return $this->hasOne(User::class,'id','UserId');
    }
}
