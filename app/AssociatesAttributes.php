<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class AssociatesAttributes extends Model
{
    //
    protected $table = 'associates';
    protected $fillable = ['id', 'name', 'attributes_id'];    
}

