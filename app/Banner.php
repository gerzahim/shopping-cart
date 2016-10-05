<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['id', 'typeofbanner', 'active', 'text_red', 'text_gray', 'title', 'description', 'button', 'imagepath', 'imagepath_price', 'link', 'product_id'];
}
