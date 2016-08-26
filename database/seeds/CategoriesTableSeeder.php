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
        	'name'=> 'No Categories', no-categories.png
        	'description'=> 'No Categories',
            'imagepath'=> 'no-categories.png',
        	'parentcategory'=> '0',
        ]);
        $product->save();
    }
}
