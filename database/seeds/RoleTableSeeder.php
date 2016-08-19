<?php

use Illuminate\Database\Seeder;

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
        ]);
        $product->save();

        $product = new \ShopCart\Role([
        	'id'=> '2',
        	'name'=> 'Administrator',
        ]);
        $product->save();
    }
}
