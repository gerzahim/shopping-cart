<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RoleTableSeeder::class);
    	$this->call(UserTableSeeder::class);
    	$this->call(CategoriesTableSeeder::class);
    	$this->call(BrandTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(BannerTableSeeder::class);
        $this->call(SubscriberTableSeeder::class);        
        //php artisan db:seed --class=BannerTableSeeder
    }
}
