<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class AssociateProductsAttributes extends Model
{
    //
    protected $fillable = ['id', 'product_attributes_values_id', 'associates_attributes_id'];        
}
