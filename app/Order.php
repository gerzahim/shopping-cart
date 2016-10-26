<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['name', 'email', 'phone', 'companyname' 'address','city', 'state', 'zip', 'country', 'phone', 'status', 'shipcompany', 'tracking',];

    public function user(){
    	return $this->belongsTo('ShopCart\User');
    }
}


