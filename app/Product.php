<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';
  protected $primaryKey = 'product_id';
	protected $fillable = ['model', 'image', 'price','description', 'title', 'h1', 'meta_title', 'meta_description'];
	
}
