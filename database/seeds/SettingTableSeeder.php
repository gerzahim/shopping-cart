<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new \ShopCart\Settings([
        	'id'=> '1',            
            'name_site'=> 'Hookah Express',
        	'title_site'=> '.:: Hookah | Express ::.',
        	'keywords_site'=> 'Hookah, miami, sales',
            'description_site'=> 'Electronics Miami',            
        	'email_site'=> 'thehookahexpress@gmail.com',
        	'phone_site'=> '+1 786-464-1348',
        	'address_site'=> '8065 NW 54th St. Doral, FL 33166 USA',
            'css_site'=> 'main.css',
            'logo_home'=> 'Logoherbnkulture.png',
            'logo_home_height'=> '120',
            'logo_home_width'=> '150',
            'has_lema'=> '1',
            'lema_home'=> 'Lema1.jpg',
            'lema_home_height'=> '100',
            'lema_home_width'=> '380',
            'logo_admin'=> 'Logoherbnkulture.png',
            'logo_admin_height'=> '50',
            'logo_admin_width'=> '60',
            'img_map'=> 'map.png',
        	'pagination_home'=> '6',
        	'pagination_shop'=> '9',
        	'link_facebook'=> '#',
        	'link_twitter'=> '#',
        	'link_linkedin'=> '#',
        	'link_dribbble'=> '#',
        	'link_google_plus'=> '#',
        	'bansidepath'=> 'poster1.jpg',
            'payment_toorder'=> 1, 
            'approve_user'=> 0,                        
        	'apipublickey'=> 'pk_test_bgDZl3Hlj03zb9UDeQYraAHk',
        	'apisecretkey'=> 'sk_test_HlLliwLgXEFhdQv4WQQamLii',
        	'loginshowprices'=> 0,
        	'buylikeguess'=> 0,
        	'select_home_prod'=> 3,
            'especial_prod_sku1'=> '45voluptatibus855',
            'especial_prod_sku2'=> '594et143',
            'especial_prod_sku3'=> '414labore282',
            'especial_prod_sku4'=> '329quia27',
            'especial_prod_sku5'=> '976eligendi992',
            'especial_prod_sku6'=> '236autem660',
            

        ]);
        $setting->save();
    }
}



