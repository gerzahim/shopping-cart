<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociateProductsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associate_products', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('products_attributes_id')->unsigned();
            $table->foreign('products_attributes_id')->references('id')->on('products_attributes')->onDelete('cascade');
            //$table->foreign('products_attributes_id')->references('id')->on('products_attributes');
            //$table->integer('attributes_values_id')->unsigned();            
            $table->integer('associates_id')->unsigned();
            $table->foreign('associates_id')->references('id')->on('associates')->onDelete('cascade');            
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
        Schema::drop('associate_products');
    }
}
