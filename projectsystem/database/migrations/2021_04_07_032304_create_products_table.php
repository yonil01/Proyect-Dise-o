<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name', 20);
            $table->string('type_category', 20);
            $table->decimal('cost', 8,2);
            $table->string('cost_delivery');
            $table->string('type_delivery', 50);
            $table->integer('qualification');
            $table->string('description');
            $table->integer('quantify');
            $table->string('url');
            //empresa
            $table->unsignedBigInteger('company_id'); // Relación con etiquetas
            $table->foreign('company_id')->references('id')->on('users'); // clave foranea
            //category
            $table->unsignedBigInteger('category_id'); // Relación con etiquetas
            $table->foreign('category_id')->references('id')->on('categories'); // clave foranea
            //stock
            
            
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
        Schema::dropIfExists('products');
    }
}
