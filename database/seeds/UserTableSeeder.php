<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //name', 'email', 'password

        $product = new \ShopCart\User([
        	'name'=> 'Costumer Shop',
        	'email'=> 'costumer@gmail.com',
        	'role'=> '1',
        	'password' => bcrypt('12345'),
        	'status'=> '1',
        ]);
        $product->save();

        $product = new \ShopCart\User([
        	'name'=> 'Administrator',
        	'email'=> 'admin@gmail.com',
        	'role'=> '2',
        	'password' => bcrypt('12345'),
        	'status'=> '1',
        ]);
        $product->save();

        $product = new \ShopCart\User([
            'name'=> 'Habib Mitha',
            'email'=> 'hmitha@gmail.com',
            'role'=> '2',
            'password' => bcrypt('123456'),
            'status'=> '1',
        ]);
        $product->save();
            
    }
}
