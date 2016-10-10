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
        	'title_site'=> '.:: Doral | Hookah ::.',
        	'keywords_site'=> 'Hookah, miami, sales',
        	'email_site'=> 'thehookahexpress@gmail.com',
        	'phone_site'=> '+1 786-464-1348',
        	'address_site'=> '8065 NW 54th St. Doral, FL 33166 USA',
        	'pagination_home'=> '6',
        	'pagination_shop'=> '9',
        	'link_facebook'=> '#',
        	'link_twitter'=> '#',
        	'link_linkedin'=> '#',
        	'link_dribbble'=> '#',
        	'link_google-plus'=> '#',
        	'bansidepath'=> 'poster1.jpg',
        	'apipublickey'=> 'pk_test_bgDZl3Hlj03zb9UDeQYraAHk',
        	'apisecretkey'=> 'sk_test_HlLliwLgXEFhdQv4WQQamLii',
        	'loginshowprices'=> 0,
        	'buylikeguess'=> 0,
        	'select_home_prod'=> 1,

        ]);
        $setting->save();
    }
}



