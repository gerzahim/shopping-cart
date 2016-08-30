<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['id', 'active', 'text_red', 'text_gray', 'title', 'description', 'button', 'imagepath', 'imagepath_price', 'product_id'];
}
