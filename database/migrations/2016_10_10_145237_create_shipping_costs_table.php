<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->float('range_value_min')->unsigned();
            $table->float('range_value_max')->unsigned();
            $table->integer('ground')->unsigned();
            $table->integer('second_day')->unsigned();
            $table->integer('next_day')->unsigned();
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
        Schema::drop('shipping_costs');
    }
}
