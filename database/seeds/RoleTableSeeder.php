<?php

use Illuminate\Database\Seeder;
use ShopCart\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \ShopCart\Role([
        	'id'=> '1',
        	'name'=> 'Costumer',
            'description'=> 'A normal Costumer User',
        ]);
        $product->save();

        $product = new \ShopCart\Role([
        	'id'=> '2',
        	'name'=> 'Administrator',
            'description'=> 'An Admin User',
        ]);
        $product->save();
    }
}
