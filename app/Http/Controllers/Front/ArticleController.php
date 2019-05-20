<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\F;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
	use F; //Plug-in universal functions
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function articles()
	{
		$settings = Setting::where('key', 'page_articles')->first();
		if(!empty($settings)) {
			$settings = json_decode($settings->value, true);
		}
		$article_items_paginator = Article::paginate(50);
		return view('front.article.articles', compact('article_items_paginator', 'settings'));
	}
	
	public function article($article_id)
	{
		$article_id = (int)$article_id;
		$sql = 'SELECT * FROM articles WHERE
			(article_id = IFNULL((SELECT MIN(article_id) FROM articles WHERE article_id > ?), 0) OR
			article_id = IFNULL((SELECT MAX(article_id) FROM articles WHERE article_id < ?),0) OR
			article_id = ?)';
		$articles = DB::select($sql, [$article_id, $article_id, $article_id]);
		
		$articles = collect($articles);
		$articles = $articles->keyBy('article_id');
		$articles = $articles->sortKeys();
		$articles = $articles->toArray();
		$article = false;
		$article_next = false;
		$article_prev = false;
		
		if(!empty($articles[(int)$article_id])) {
			$article = $articles[$article_id];
			unset($articles[(int)$article_id]);
		}
		$articles = array_values($articles);
		if(isset($articles[0])) {
			if((int)$articles[0]->article_id > $article_id) {
				$article_next = $articles[0];
			} else {
				$article_prev = $articles[0];
			}
		}
		if(isset($articles[1])) {
			if((int)$articles[1]->article_id > $article_id) {
				$article_next = $articles[1];
			} else {
				$article_prev = $articles[1];
			}
		}
		
		
		
		return view('front.article.article', compact('article', 'article_next', 'article_prev'));
	}
	
}
