<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValues extends Model
{
    //
    protected $fillable = ['product_id', 'attributes_values_id'];        
}
