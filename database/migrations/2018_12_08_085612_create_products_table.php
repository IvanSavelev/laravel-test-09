<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('product_id');
	          $table->string('model', 255);
	          $table->string('image', 255);
	          $table->decimal('price', 15, 4)->default(0.0000);
	          $table->text('description');
	          $table->string('title', 255);
	          $table->string('h1', 255);
	          $table->string('meta_title', 255);
	          $table->string('meta_description', 255);
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
