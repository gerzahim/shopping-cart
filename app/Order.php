<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
    	return $this->belongsTo('ShopCart\User');
    }
}
