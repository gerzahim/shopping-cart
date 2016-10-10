<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    
    protected $fillable = ['user_id', 'product_id', 'qty',];
}
