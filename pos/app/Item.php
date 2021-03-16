<?php

namespace App;

use App\Brand;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded=[];

public function brands()
{
    return $this->hasOne(Brand::class,'id','brand_id');
}
public function categories()
{
    return $this->hasOne(Category::class,'id','category_id');
}

}
