<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new \ShopCart\Product([
        	'sku'=> 'MM101',
        	'title'=> 'Product 1',
        	'description'=>'Lorem Ipsum is simply dummy text of the printing and pesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
        	'imagepath'=> 'MM101.jpg',
        	'price'=> '11.5',
        	'quantity'=> '100',
        	'status'=> '1',
        	'categories_id'=> 1,
        	'brand_id'=> 1
        ]);
        $product->save();

        $product = new \ShopCart\Product([
        	'sku'=> 'MM102',
        	'title'=> 'Product 2',
        	'description'=>'Lorem Ipsum is simply dummy text of the printing and pesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
        	'imagepath'=> 'MM102.jpg',
        	'price'=> '12.5',
        	'quantity'=> '100',
        	'status'=> '1',
        	'categories_id'=> 1,
        	'brand_id'=> 1
        ]);
        $product->save();

        $product = new \ShopCart\Product([
        	'sku'=> 'MM103',
        	'title'=> 'Product 3',
        	'description'=>'Lorem Ipsum is simply dummy text of the printing and pesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
        	'imagepath'=> 'MM103.jpg',
        	'price'=> '13.5',
        	'quantity'=> '100',
        	'status'=> '1',
        	'categories_id'=> 1,
        	'brand_id'=> 1
        ]);
        $product->save();

         $product = new \ShopCart\Product([
        	'sku'=> 'MM104',
        	'title'=> 'Product 4',
        	'description'=>'Lorem Ipsum is simply dummy text of the printing and pesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
        	'imagepath'=> 'MM104.jpg',
        	'price'=> '14.5',
        	'quantity'=> '100',
        	'status'=> '1',
        	'categories_id'=> 1,
        	'brand_id'=> 1
        ]);
        $product->save();

        $product = new \ShopCart\Product([
        	'sku'=> 'MM105',
        	'title'=> 'Product 5',
        	'description'=>'Lorem Ipsum is simply dummy text of the printing and pesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
        	'imagepath'=> 'MM105.jpg',
        	'price'=> '15.5',
        	'quantity'=> '100',
        	'status'=> '1',
        	'categories_id'=> 1,
        	'brand_id'=> 1
        ]);
        $product->save();

        $product = new \ShopCart\Product([
        	'sku'=> 'MM106',
        	'title'=> 'Product 6',
        	'description'=>'Lorem Ipsum is simply dummy text of the printing and pesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
        	'imagepath'=> 'MM106.jpg',
        	'price'=> '16',
        	'quantity'=> '100',
        	'status'=> '1',
        	'categories_id'=> 1,
        	'brand_id'=> 1
        ]);
        $product->save();                         
        
    }
}


