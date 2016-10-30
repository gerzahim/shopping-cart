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
        Schema::create('associate_products_attributes', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('product_attributes_values_id')->unsigned();
            //$table->integer('attributes_values_id')->unsigned();            
            $table->integer('associates_attributes_id')->unsigned();            
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
        Schema::drop('associate_products_attributes');
    }
}
