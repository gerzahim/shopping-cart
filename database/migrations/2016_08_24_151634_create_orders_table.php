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
            $table->integer('status')->unsigned()->default('1');   // 1 order Pending for Delivery, 2 Out for delivery          
            $table->string('shipcompany')->nullable();  
            $table->string('tracking')->nullable();  
            $table->integer('user_id');
            $table->text('cart');
            $table->text('address');
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
