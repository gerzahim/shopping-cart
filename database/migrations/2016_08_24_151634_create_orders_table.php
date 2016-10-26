<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('gender',array(‘M’,’F’)->default(‘M’);
            $table->integer('status')->unsigned()->default('1');   // 0 Pick Up Order, 1 order Pending for Delivery, 2 Out for delivery,         
            $table->string('shipcompany')->nullable();  
            $table->string('tracking')->nullable();  
            $table->integer('user_id');
            $table->text('cart');
            $table->string('phone')->nullable();
            $table->string('companyname')->nullable();            
            $table->text('address');
            $table->text('city');
            $table->text('state');
            $table->text('zip');
            $table->text('country');
            $table->string('name');
            $table->string('email');            
            $table->string('phone');
            $table->string('payment_id');
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
        Schema::drop('orders');
    }
}
