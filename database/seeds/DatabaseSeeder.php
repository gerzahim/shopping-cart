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
        $this->call(SettingTableSeeder::class);
        $this->call(ShippingCostTableSeeder::class);
        //$this->call(ImagesProductTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(AttributesValuesTableSeeder::class);
        //$this->call(ProductAttributeTableSeeder::class);
        //$this->call(AssociateTableSeeder::class);
        //$this->call(AssociateProductTableSeeder::class);
                        
        //php artisan db:seed --class=BannerTableSeeder
    }
}
