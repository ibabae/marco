<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function User(){
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function State(){
        return $this->hasOne(State::class, 'id','state');
    }

}
