<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('typeofbanner')->unsigned()->nullable();            
            $table->string('active')->nullable();
            $table->string('text_red')->nullable();
            $table->string('text_gray')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('button');
            $table->string('imagepath');           
            $table->string('imagepath_price')->nullable();
            $table->string('link');
            $table->integer('product_id')->unsigned()->nullable();
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
        Schema::drop('banners');
    }
}
