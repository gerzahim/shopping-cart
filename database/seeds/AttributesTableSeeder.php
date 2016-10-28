<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new \ShopCart\Attributes([
        	'id'=> '1',
            'name'=> "Color"
        ]);
        $banner->save();

        $banner = new \ShopCart\Attributes([
        	'id'=> '2',
            'name'=> "Size"
        ]);
        $banner->save();
    }
}
