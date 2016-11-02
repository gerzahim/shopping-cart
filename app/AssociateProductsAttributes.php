<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class AssociateProductsAttributes extends Model
{
    //
    protected $table = 'associate_products';
    protected $fillable = ['id', 'products_attributes_id', 'associates_id'];        
}
