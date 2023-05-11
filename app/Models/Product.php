<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'UserId',
        'Title',
        'Featured',
        'Code',
        'Material',
        'Price',
        'DisType',
        'DisAmount',
        'Descriptions',
        'Content',
        'Status',
        'Stock',
        'MainCategory',
        'SubCategory',
        'Tags',
        'PrimaryImage',
        'SecondaryImage',
        'UniqueId',
    ];
    public function MainCat(){
        return $this->hasOne(Category::class, 'id','MainCategory');
    }
    public function SubCat(){
        return $this->hasOne(Category::class, 'id','SubCategory');
    }

}
