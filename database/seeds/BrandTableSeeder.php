<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \ShopCart\Brand([
        	'id'=> '1',
        	'name'=> 'Generic',
        ]);
        $product->save();
    }
}
