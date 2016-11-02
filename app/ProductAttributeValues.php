<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValues extends Model
{
    //
    protected $table = 'products_attributes';
    
    protected $fillable = ['id', 'product_id', 'attributes_values_id'];        
}
