<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'category_id';
	protected $fillable = ['image', 'parent_id', 'sort_order','visible', 'description', 'title', 'h1', 'meta_title', 'meta_description'];
}
