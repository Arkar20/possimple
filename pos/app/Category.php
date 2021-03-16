<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
class Category extends Model
{
    protected $fillable=['brand_id','name'];

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
