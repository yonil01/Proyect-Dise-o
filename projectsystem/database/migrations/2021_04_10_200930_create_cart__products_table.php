<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart__products', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            //cart
            $table->unsignedBigInteger('cart_id'); // Relación con etiquetas
            $table->foreign('cart_id')->references('id')->on('carts'); // clave foranea
            //cart
            $table->unsignedBigInteger('product_id'); // Relación con etiquetas
            $table->foreign('product_id')->references('id')->on('products'); // clave foranea

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
        Schema::dropIfExists('cart__products');
    }
}
