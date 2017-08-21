<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];

    //relation ship between category and product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
