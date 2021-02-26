<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->bigIncrements('cart_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('pdt_id');
            $table->string('pdt_name');
            $table->string('pdt_price');
            $table->string('pdt_subtotal');
            $table->string('pdt_total');
            $table->string('pdt_image');
            $table->string('pdt_quantity');
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
        Schema::dropIfExists('shopping_cart');
    }
}
