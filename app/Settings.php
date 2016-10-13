<?php

namespace ShopCart;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $fillable = ['id', 'name_site', 'title_site','keywords_site','description_site','email_site','phone_site','address_site','css_site','logo_home','logo_home_height','logo_home_width','lema_home','has_lema','lema_home_height', 'lema_home_width','logo_admin','logo_admin_height','logo_admin_width','img_map','pagination_home','pagination_shop','link_facebook','link_twitter','link_linkedin','link_dribbble','link_google_plus','bansidepath', 'payment_toorder', 'approve_user','apipublickey','apisecretkey','loginshowprices','buylikeguess','select_home_prod','especial_prod_sku1','especial_prod_sku2','especial_prod_sku3','especial_prod_sku4','especial_prod_sku5','especial_prod_sku6','quick_cat_id1','quick_cat_name1','quick_cat_id2','quick_cat_name2','quick_cat_id3','quick_cat_name3','quick_cat_id4','quick_cat_name4','quick_cat_id5','quick_cat_name5'];
}

