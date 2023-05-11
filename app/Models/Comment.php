<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'UserId',
        'PostId',
        'Parent',
        'Rating',
        'Comment',
        'Author',
        'Phone',
        'Job',
        'Status',
    ];
    public function Product(){
        return $this->hasOne(Product::class, 'id','PostId');
    }
    public function User(){
        return $this->hasOne(User::class, 'id','UserId');
    }
}
