<?php

use Illuminate\Database\Seeder;

class SubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \ShopCart\Subscriber([
        	'email'=> 'costumer11@gmail.com',
            'status'=> '1',
        ]);
        $product->save();
    }
}
