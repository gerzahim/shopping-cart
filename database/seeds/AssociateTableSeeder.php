<?php

use Illuminate\Database\Seeder;

class AssociateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new \ShopCart\AssociatesAttributes([
			'name'=> 'Phone 1',
        	'attributes_id'=> '1'
        ]);
        $product->save();      
          
        $product = new \ShopCart\AssociatesAttributes([
			'name'=> 'Phone 2',
        	'attributes_id'=> '1'
        ]);
        $product->save();            
    }
}


