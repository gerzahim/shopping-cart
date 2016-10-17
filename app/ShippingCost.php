<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    //
    protected $fillable = ['name','range_value_min','range_value_max','ground','second_day','next_day',];
}

