<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function User(){
        return $this->belongsTo(User::class, 'userId');
    }

    public function State(){
        return $this->belongsTo(State::class,'stateId');
    }
    public function City(){
        return $this->belongsTo(City::class,'cityId');
    }

}
