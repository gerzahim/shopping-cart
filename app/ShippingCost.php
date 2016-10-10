<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    //
    protected $fillable = ['range_value_min','range_value_max','ground','2nd_day','next_day'];
}

