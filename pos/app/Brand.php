<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   protected $fillable=['brand','company','desc'];

   public function categories()
   {
      return $this->belongsToMany(Category::class);
   }
}
