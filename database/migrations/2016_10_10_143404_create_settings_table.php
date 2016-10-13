<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_site')->nullable();
            $table->string('title_site')->nullable();
            $table->string('keywords_site')->nullable();
            $table->string('description_site')->nullable();            
            $table->string('email_site')->nullable();
            $table->string('phone_site')->nullable();
            $table->string('address_site')->nullable();
            $table->string('css_site')->nullable();
            $table->string('logo_home')->nullable();
            $table->string('logo_home_height')->nullable();
            $table->string('logo_home_width')->nullable();
            $table->integer('has_lema')->default('1'); //0 Doesn't have lema ; 1 has lema            
            $table->string('lema_home')->nullable();
            $table->string('lema_home_height')->nullable();
            $table->string('lema_home_width')->nullable();
            $table->string('logo_admin')->nullable();
            $table->string('logo_admin_height')->nullable();
            $table->string('logo_admin_width')->nullable();
            $table->string('img_map')->nullable();
            $table->integer('pagination_home')->default('6');
            $table->integer('pagination_shop')->default('9');
            $table->string('link_facebook')->nullable();
            $table->string('link_twitter')->nullable();
            $table->string('link_linkedin')->nullable();
            $table->string('link_dribbble')->nullable();
            $table->string('link_google_plus')->nullable();
            $table->string('bansidepath')->nullable(); // Banner sidebar on Home
            $table->integer('payment_toorder')->default('1');   // 0 Don't check payment to order, 1 Payment to Order
            $table->integer('approve_user')->default('0');   // 0 Don't need Aprroval, 1 Need Approval to Enter on website
            $table->string('apipublickey')->nullable(); // Public Key Stripe.com
            $table->string('apisecretkey')->nullable(); // Secret Key Stripe.com
            $table->integer('loginshowprices')->default('0');   // 0 Don't Show Prices, 1 Show prices
            $table->integer('buylikeguess')->default('0');   // 0 Don't Buy like Guess, 1 Buy like Guess
            $table->integer('select_home_prod')->default('1');   // 1  New Arrivals, 2 Random Products, 3 Select Especial Products 
            $table->integer('especial_prod_id1')->nullable();
            $table->integer('especial_prod_id2')->nullable();
            $table->integer('especial_prod_id3')->nullable();
            $table->integer('especial_prod_id4')->nullable();
            $table->integer('especial_prod_id5')->nullable();
            $table->integer('especial_prod_id6')->nullable();
            $table->integer('quick_cat_id1')->nullable();
            $table->string('quick_cat_name1')->nullable();
            $table->integer('quick_cat_id2')->nullable();
            $table->string('quick_cat_name2')->nullable();
            $table->integer('quick_cat_id3')->nullable();
            $table->string('quick_cat_name3')->nullable();
            $table->integer('quick_cat_id4')->nullable();
            $table->string('quick_cat_name4')->nullable();
            $table->integer('quick_cat_id5')->nullable();
            $table->string('quick_cat_name5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
