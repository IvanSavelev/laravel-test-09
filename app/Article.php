<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';
	protected $primaryKey = 'article_id';
	protected $fillable = ['image', 'sort_order','visible', 'description', 'title', 'h1', 'meta_title', 'meta_description'];
}
