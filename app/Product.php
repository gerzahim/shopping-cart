<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku','title','description','imagepath','price','quantity','status','categories_id','brand_id'];



    
}
