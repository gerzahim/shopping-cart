<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['id', 'name', 'imagepath'];
}
