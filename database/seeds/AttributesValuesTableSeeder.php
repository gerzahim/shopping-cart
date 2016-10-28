<?php

use Illuminate\Database\Seeder;

class AttributesValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        $banner = new \ShopCart\AttributesValues([
        	'id'=> '1',
            'att_value'=> "Yellow",
            'attributes_id'=> '1'
        ]);
        $banner->save();
        $banner = new \ShopCart\AttributesValues([
        	'id'=> '2',
            'att_value'=> "Blue",
            'attributes_id'=> '1'
        ]);        
        $banner->save();
        $banner = new \ShopCart\AttributesValues([
        	'id'=> '3',
            'att_value'=> "Red",
            'attributes_id'=> '1'
        ]);        
        $banner->save();
        $banner = new \ShopCart\AttributesValues([
        	'id'=> '4',
            'att_value'=> "Small",
            'attributes_id'=> '2'
        ]);        
        $banner->save();
        $banner = new \ShopCart\AttributesValues([
        	'id'=> '5',
            'att_value'=> "Medium",
            'attributes_id'=> '2'
        ]);        
        $banner->save();  
        $banner = new \ShopCart\AttributesValues([
        	'id'=> '6',
            'att_value'=> "Large",
            'attributes_id'=> '2'
        ]);        
        $banner->save();                      


    }
}
