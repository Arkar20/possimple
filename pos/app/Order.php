<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','cart'];


    public function getCreated_atAttribute($created_at)
    {
       return $this->created_at;
    }
}
