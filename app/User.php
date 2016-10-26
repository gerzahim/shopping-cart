<?php

namespace ShopCart;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'role', 'password', 'address', 'city', 'state', 'zip', 'country', 'phone', 'companyname', 'salestax', 'website', 'status',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){
        return $this->hasMany('ShopCart\Order');
    }

    public function roles(){
        return $this->hasMany('ShopCart\Role', 'user_role', 'user_id', 'role_id');
    }    
}
