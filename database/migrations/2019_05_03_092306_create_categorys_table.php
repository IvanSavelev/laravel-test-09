<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
	          $table->increments('category_id');
	          $table->string('image', 255)->nullable();
	          $table->integer('parent_id')->default(0);
	          $table->integer('sort_order')->default(0);
	          $table->boolean('visible');
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
        Schema::dropIfExists('category');
    }
}
