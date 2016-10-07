<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['name', 'email', 'phone', 'status', 'shipcompany', 'tracking',];

	
    public function user(){
    	return $this->belongsTo('ShopCart\User');
    }
}
