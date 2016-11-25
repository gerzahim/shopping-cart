<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('imagepath')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('status');
            $table->integer('categories_id')->unsigned();
            //$table->foreign('category_id')
                  //->references('id')
                  //->on('categories')
                  //->onDelete('cascade');
            //$table->foreign('categories_id')->references('id')->on('categories');
            $table->integer('brand_id')->unsigned();
            //$table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::drop('products');
    }
}
