<?php

use Illuminate\Database\Seeder;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new \ShopCart\ProductAttributeValues([
			'product_id'=> '1',
        	'attributes_values_id'=> '1'
        ]);
        $product->save();  

        $product = new \ShopCart\ProductAttributeValues([
			'product_id'=> '2',
        	'attributes_values_id'=> '2'
        ]);
        $product->save();

        $product = new \ShopCart\ProductAttributeValues([
			'product_id'=> '3',
        	'attributes_values_id'=> '1'
        ]);
        $product->save();     

        $product = new \ShopCart\ProductAttributeValues([
			'product_id'=> '4',
        	'attributes_values_id'=> '2'
        ]);
        $product->save();     
                        
    }
}
