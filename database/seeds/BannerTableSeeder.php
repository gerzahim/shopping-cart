<?php

use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new \ShopCart\Banner([
        	'active'=> 'active',
            'typeofbanner'=> "0",
            'text_red'=> 'ON', 
        	'text_gray'=> '-SALE',
        	'title'=> 'Hookah Jamila Cage Rainbow Silver', 
        	'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        	'button' => 'Get it now',
            'imagepath'=> 'banner1.jpg',
        	'imagepath_price'=> 'pricing.png',
            'link'=> '#',            
        	'product_id'=> "0"
        ]);
        $banner->save();
        $banner = new \ShopCart\Banner([
            'active'=> '',
            'typeofbanner'=> "0",
        	'text_red'=> 'AWS', 
        	'text_gray'=> '-100',
        	'title'=> '100% American Weight Scale', 
        	'description'=> 'Digital Pocket Scale AWS Blade 100 Gram x 0.01g Ounce Jewelry Carat Grain Black.',
        	'button' => 'Get it now',
            'imagepath'=> 'banner2.jpg',
        	'imagepath_price'=> '',
            'link'=> '#',
        	'product_id'=> "0"
        ]);
        $banner->save();
        $banner = new \ShopCart\Banner([
            'active'=> '',
            'typeofbanner'=> "0",
        	'text_red'=> 'RAW', 
        	'text_gray'=> '-SHOPPER',
        	'title'=> 'Greatest invention of our time', 
        	'description'=> 'Classic rolling papers are a pure, less processed rolling paper unlike anything that you have ever seen or smoked.',
            'imagepath'=> 'banner3.jpg',
        	'imagepath_price'=> Null,
            'link'=> '#',
        	'product_id'=> "0"
        ]);
        $banner->save();        

    }
}
