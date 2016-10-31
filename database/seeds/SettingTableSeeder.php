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

        /*
        // HOOKAH EXPRESS        
        $setting = new \ShopCart\Settings([
        	'id'=> '1',            
            'name_site'=> 'Herb&#039;n Kulture',
        	'title_site'=> '.:: Herb&#039;n Kulture  ::. Wholesale Smoke Shop &amp; Hookah needs',
        	'keywords_site'=> 'Wholesale, Smoke, Hookah, miami, doral, sales',
            'description_site'=> 'Smoke Shop &amp; Hookah needs Wholesale, Glass accesories, Glass Pipes, Grinders, Scales, Smoking accesories, Vape accesories, butanes and torches and more',            
        	'email_site'=> 'herbnkulture@gmail.com',
            'web_site'=> 'http://www.herbnkulture.com',
        	'phone_site'=> '+1 786-464-1348',
        	'address_site'=> '8065 NW 54th St. Doral, FL 33166 USA',
            'css_site'=> 'main_herbnkulture.css',
            'dark_menu'=> 0,
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
        	'link_instagram'=> '#',
            'link_linkedin'=> '#',
        	'link_dribbble'=> '#',
        	'link_google_plus'=> '#',
        	'bansidepath'=> 'poster1.jpg',
            'payment_toorder'=> 0, 
            'approve_user'=> 1, 
            'kind_web'=> 2,
        	'apipublickey'=> 'pk_test_bgDZl3Hlj03zb9UDeQYraAHk',
        	'apisecretkey'=> 'sk_test_HlLliwLgXEFhdQv4WQQamLii',
        	'loginshowprices'=> 1,
        	'buylikeguess'=> 0,
        	'select_home_prod'=> 1,
            'especial_prod_sku1'=> '',
            'especial_prod_sku2'=> '',
            'especial_prod_sku3'=> '',
            'especial_prod_sku4'=> '',
            'especial_prod_sku5'=> '',
            'especial_prod_sku6'=> '',
            

        ]);
        $setting->save();


        /* */
        
        /*
        // DORAL HOOKAH
        $setting = new \ShopCart\Settings([
            'id'=> '1',            
            'name_site'=> 'Doral Hookah',
            'title_site'=> '.:: Doral | Hookah ::.',
            'keywords_site'=> 'Hookah, miami, sales',
            'description_site'=> 'Shop for hookahs, smokes, vapes, tobacco, raw, 420 & more new smokes stuffs. In-store pickup & free 2-day',               
            'email_site'=> 'doralhookahs@gmail.com',
            'web_site'=> 'http://www.doralhookah.com',
            'phone_site'=> '+1 305-879-6662',
            'address_site'=> '7884 NW 52nd St. Doral, FL 33166 USA',
            'css_site'=> 'main_doralhookah.css',
            'dark_menu'=> 1,
            'logo_home'=> 'LogoDoralHooakh2.jpg',
            'logo_home_height'=> '120',
            'logo_home_width'=> '150',
            'has_lema'=> '0',
            'lema_home'=> 'Lema1.jpg',
            'lema_home_height'=> '100',
            'lema_home_width'=> '380',
            'logo_admin'=> 'Logosolodoral.jpg',  
            'logo_admin_height'=> '50',
            'logo_admin_width'=> '120',
            'img_map'=> 'map2.png',
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
            'kind_web'=> 1,                        
            'apipublickey'=> 'pk_test_bgDZl3Hlj03zb9UDeQYraAHk',
            'apisecretkey'=> 'sk_test_HlLliwLgXEFhdQv4WQQamLii',
            'loginshowprices'=> 0,
            'buylikeguess'=> 1,
            'select_home_prod'=> 1,
            'especial_prod_sku1'=> '',
            'especial_prod_sku2'=> '',
            'especial_prod_sku3'=> '',
            'especial_prod_sku4'=> '',
            'especial_prod_sku5'=> '',
            'especial_prod_sku6'=> '',
            

        ]);
        $setting->save();
        /* */



        // CROWN TRADING
        $setting = new \ShopCart\Settings([
            'id'=> '1',            
            'name_site'=> 'Crown Trading',
            'title_site'=> '.:: Crown Trading Miami: Expert Service. Unbeatable Price. ::.',
            'keywords_site'=> 'Electronics, miami, sales',
            'description_site'=> 'Shop for electronics, computers, appliances, cell phones, video games & more new tech. In-store pickup & free 2-day',            
            'email_site'=> 'hmitha@gmail.com',
            'web_site'=> 'http://www.crowntradingmiami.com/',
            'phone_site'=> '+1 954-790-2620',
            'address_site'=> '3062 NW 72 Ave. Doral, FL 33166 USA',
            'css_site'=> 'main_crowntradingmiami.css',
            'dark_menu'=> 0,
            'logo_home'=> 'CrownTrading.png',
            'logo_home_height'=> '150',
            'logo_home_width'=> '150',
            'has_lema'=> '1',
            'lema_home'=> 'Lema.jpg',
            'lema_home_height'=> '120',
            'lema_home_width'=> '400',
            'logo_admin'=> 'CrownTrading.png',
            'logo_admin_height'=> '80',
            'logo_admin_width'=> '90',
            'img_map'=> 'map.png',
            'pagination_home'=> '6',
            'pagination_shop'=> '9',
            'link_facebook'=> '#',
            'link_twitter'=> '#',
            'link_instagram'=> '#',
            'link_linkedin'=> '#',
            'link_dribbble'=> '#',
            'link_google_plus'=> '#',
            'bansidepath'=> 'poster1.jpg',
            'payment_toorder'=> 1, 
            'approve_user'=> 0, 
            'kind_web'=> 1,                        
            'apipublickey'=> 'pk_test_bgDZl3Hlj03zb9UDeQYraAHk',
            'apisecretkey'=> 'sk_test_HlLliwLgXEFhdQv4WQQamLii',
            'loginshowprices'=> 0,
            'buylikeguess'=> 0,
            'select_home_prod'=> 1,
            'especial_prod_sku1'=> '',
            'especial_prod_sku2'=> '',
            'especial_prod_sku3'=> '',
            'especial_prod_sku4'=> '',
            'especial_prod_sku5'=> '',
            'especial_prod_sku6'=> '',  
           
        ]);
        $setting->save();    
        /* */

    }
}



