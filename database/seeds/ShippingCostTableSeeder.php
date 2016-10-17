<?php

use Illuminate\Database\Seeder;

class ShippingCostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \ShopCart\ShippingCost([
        	'name'=> 'Pick up store',
            'range_value_min'=> '0',
            'range_value_max'=> '0',
            'ground'=> '0',
            'second_day'=> '0',
            'next_day'=> '0',
        ]);
        $product->save();

        $product = new \ShopCart\ShippingCost([
        	'name'=> 'Up to $25.00',
            'range_value_min'=> '0.01',
            'range_value_max'=> '25',
            'ground'=> '6.25',
            'second_day'=> '11',
            'next_day'=> '20',
        ]);
        $product->save();

        $product = new \ShopCart\ShippingCost([
        	'name'=> '$25.01 to $100.00',
            'range_value_min'=> '25.01',
            'range_value_max'=> '100',
            'ground'=> '7.25',
            'second_day'=> '14',
            'next_day'=> '25',
        ]);
        $product->save();

        $product = new \ShopCart\ShippingCost([
        	'name'=> '$100.01 to $200.00',
            'range_value_min'=> '100.01',
            'range_value_max'=> '200',
            'ground'=> '8.25',
            'second_day'=> '17',
            'next_day'=> '30',
        ]);
        $product->save();   


		$product = new \ShopCart\ShippingCost([
        	'name'=> '$200.01 & Over',
            'range_value_min'=> '200.01',
            'range_value_max'=> '',
            'ground'=> '9.25',
            'second_day'=> '20',
            'next_day'=> '40',
        ]);
        $product->save();    
    }
}


