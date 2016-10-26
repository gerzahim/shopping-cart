<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    //
    protected $fillable = ['code','name', 'tax'];
}
