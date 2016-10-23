<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \ShopCart\Categories([
        	'id'=> '1',
        	'name'=> 'No Category', 
        	'description'=> 'No Category',
            'imagepath'=> 'no-categories.png',
        	//'parent_id'=> '0',
        ]);
        $product->save();

        $product = new \ShopCart\Categories([
            'id'=> '2',
            'name'=> 'Body', 
            'description'=> 'No Category',
            'imagepath'=> 'no-categories.png',
            //'parent_id'=> '0',
        ]);
        $product->save(); 

        $product = new \ShopCart\Categories([
            'id'=> '3',
            'name'=> 'Ear', 
            'description'=> 'No Category',
            'imagepath'=> 'no-categories.png',
            'parent_id'=> '2',
        ]);
        $product->save();


        $product = new \ShopCart\Categories([
            'id'=> '4',
            'name'=> 'Ear Jewerly Right', 
            'description'=> 'No Category',
            'imagepath'=> 'no-categories.png',
            'parent_id'=> '3',
        ]);
        $product->save();


        $product = new \ShopCart\Categories([
            'id'=> '5',
            'name'=> 'Ear Jewerly Left', 
            'description'=> 'No Category',
            'imagepath'=> 'no-categories.png',
            'parent_id'=> '3',
        ]);
        $product->save();
    }
}
