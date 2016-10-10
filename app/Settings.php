<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $fillable = ['title_site','keywords_site','email_site','phone_site','address_site','pagination_home','pagination_shop','link_facebook','link_twitter','link_linkedin','link_dribbble','link_google-plus','bansidepath','apipublickey','apisecretkey','loginshowprices','buylikeguess','select_home_prod','especial_prod_id1','especial_prod_id2','especial_prod_id3','especial_prod_id4','especial_prod_id5','especial_prod_id6','quick_cat_id1','quick_cat_id2','quick_cat_id3','quick_cat_id4','quick_cat_id5'];
}

