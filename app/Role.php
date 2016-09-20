<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];
    
    public function users(){

    	return $this->belongsTomany('ShopCart\User', 'user_role', 'role_id', 'user_id');

    }



}
