<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['id', 'name', 'description', 'imagepath', 'parent_id',];



   //category has childs
   public function childs() {
           return $this->hasMany('ShopCart\Categories','parent_id','id') ;
   }


}


