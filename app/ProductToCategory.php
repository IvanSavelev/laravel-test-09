<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model
{
	protected $table = 'products_to_categories';
	protected $fillable = ['product_id', 'category_id'];
}
