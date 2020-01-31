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
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description', 255);
            $table->string('image', 255);
            $table->integer('type_1')->unsigned()->nullable();
            $table->integer('type_2')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('type_1')->references('id')->on('product_types')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('type_2')->references('id')->on('product_types')
                ->onDelete('set null')
                ->onUpdate('cascade');
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
