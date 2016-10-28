<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValues extends Model
{
    //
    protected $fillable = ['products_id', 'attributes_values_id'];        
}
