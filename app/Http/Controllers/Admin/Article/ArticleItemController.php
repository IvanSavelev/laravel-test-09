<?php

namespace App\Http\Controllers\Admin;

use App\F;
use App\Http\Controllers;
use App\Article;
use App\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleItemController extends Controllers\Admin\AdminController
{


	public function add()
	{
		$next_id = Article::max('article_id') + 1;
		return view('admin.article.article_form', ['object_id' => $next_id, 'object_type' => 'article', 'article' => null]);
	}

	public function edit($article_id)
	{
		$article = Article::findOrFail($article_id);
		return view('admin.article.article_form', compact('article') + ['object_id' => $article->article_id, 'object_type' => 'article']);
	}

	public function save(Request $request, $article_id)
	{
		$article_id = (int)$article_id;
		if (Article::where('article_id', $article_id)->exists()) {
			$add_article = false;
		} else {
			$add_article = true;
		}
		
		$image_path = null;
		if ($request->file('image') and $request->file('image')->isValid()) {
			$this->deleteImageItem('article', $article_id);
			$this->addImage($request->image, $article_id, 'article');
		}
		if ($request->delete_image) {
			$this->deleteImageItem('article', $article_id);
		}
		
		Validator::make($request->all(), [
			'title' => 'required|max:255',
			'h1' => 'max:255',
			'description' => '',
			'meta_title' => 'max:255',
			'meta_description' => 'max:255',
			'date' => 'required|date',
		])->validate();
		
		$article = Article::firstOrNew(['article_id' => $article_id]);
		$article->title = $request->title;
		$article->h1 = request('h1', '');
		$article->description = request('description', '');
		$article->meta_title = request('meta_title', '');
		$article->meta_description = request('meta_description', '');
		$article->visible = $request->visible == 'on' ? 1 : 0;
		$date = date_create($request->date);
		$article->date = date_format($date, 'Y-m-d');
		$article->save();
		
		if ($add_article) {
			return redirect()->route('admin.article.index')->with('status', 'Статья успешно добавлена!');
		}
		if (request('redirect_here', 0)) {
			return redirect()->back()->with('status', 'Статья успешно изменена!');
		} else {
			return redirect()->route('admin.article.index')->with('status', 'Статья успешно изменена!');
		}
	}
}
