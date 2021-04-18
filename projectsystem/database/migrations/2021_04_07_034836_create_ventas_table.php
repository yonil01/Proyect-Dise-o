<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            //empresa
            $table->unsignedBigInteger('company_id'); // Relación con etiquetas
            $table->foreign('company_id')->references('id')->on('companies'); // clave foranea
            //client
            $table->unsignedBigInteger('client_id'); // Relación con etiquetas
            $table->foreign('client_id')->references('id')->on('clients'); // clave foranea
            //ticket
            $table->unsignedBigInteger('ticket_id'); // Relación con etiquetas
            $table->foreign('ticket_id')->references('id')->on('tickets'); // clave foranea
            //product
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
        Schema::dropIfExists('ventas');
    }
}
