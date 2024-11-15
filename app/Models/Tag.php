<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];
    public $timestamps = false;
    protected $fillable = ['name'];

    public function taggables(): MorphToMany
    {
        return $this->morphToMany(Product::class, 'taggable');
    }

}
