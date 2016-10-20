<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['id', 'name', 'description', 'imagepath', 'parent_id',];


   //category has childs
    /*
   public function childs() {
           return $this->hasMany('ShopCart\Categories','parent_id','id') ;
   }
	*/

   
  //each category might have one parent
  public function parent() {
    return $this->belongsToOne(static::class, 'parent_id');
  }

  //each category might have multiple children
  public function children() {
    return $this->hasMany(static::class, 'parent_id');
  }   


}


