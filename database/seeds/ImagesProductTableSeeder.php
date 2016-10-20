<?php

use Illuminate\Database\Seeder;

class ImagesProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \ShopCart\ImagesProduct([
			'product_id'=> 1,
        	'imagepath1'=> 'MM106.jpg'
        ]);
        $product->save();
    }

}
