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
        	'name'=> 'No Categories', 
        	'description'=> 'No Categories',
            'imagepath'=> 'no-categories.png',
        	'parent_id'=> '0',
        ]);
        $product->save();
    }
}
