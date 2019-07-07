<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers;
use App\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleListController extends Controllers\Admin\AdminController
{

	public function list()
	{
		$articles = Article::paginate(50);
		$this->cutDescription($articles);

		return view('admin.article.article_list', compact('articles'));
	}

	private function cutDescription(&$articles)
	{
		foreach ($articles as $key => &$item) {
			$description = strip_tags($item->description);
			$description = Str::limit($description, 60);
			if (mb_strrpos($description, ' ') !== false) {
				$description = mb_substr($description, 0, mb_strrpos($description, ' '));
				$description .= '...';
			}
			$item->description = $description;
		}
		unset($item);
	}


	/**
	 * Delete image for product
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function delete(Request $request)
	{
		$ids_delete = $request->input('ids_delete');
		$ids_delete = explode(',', $ids_delete);
		Article::whereIn('article_id', $ids_delete)->delete();
		foreach ($ids_delete as $item) {
			Storage::disk('public')->deleteDirectory($this->getDirectoryFile() . $item . '/');
		}
	}


}
