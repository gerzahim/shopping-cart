<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['id', 'name', 'description', 'parentcategory',];
}


