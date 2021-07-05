<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('img');
            $table->float('price');
            $table->text('des');
            $table->tinyInteger('status')->default(1);
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('category_models');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('products_models');
    }
}
