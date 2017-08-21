<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','description','size','category_id','image','price'];

    //Relation between product and category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
