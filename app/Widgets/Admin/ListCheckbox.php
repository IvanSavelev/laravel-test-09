<?php

namespace App\Widgets\Admin;

use App\Article;
use App\Category;
use App\F;
use App\Product;
use Arrilot\Widgets\AbstractWidget;
use http\Env\Request;

class ListCheckbox extends AbstractWidget
{
	use F;
	/**
	 * The configuration array.
	 *
	 * @var array
	 */
	protected $config = [
		'label' => 'Имя поля',
		'required' => false,
		'type' => 'categories',
	];
	
	/**
	 * Treat this method as a controller action.
	 * Return view() or other content to display.
	 */
	public function run($selected_ids, string $name)
	{
		if($this->config['type'] == 'categories') {
			$objects = $this->getCategories($name);
		}
		if($this->config['type'] == 'products') {
			$objects = $this->getProducts($name);
		}
		if($this->config['type'] == 'articles') {
			$objects = $this->getArticles($name);
		}
		
		$ids = [];
		if(!empty($selected_ids)) {
			if(is_array($selected_ids)) {
				if(isset($selected_ids[$name])) {
					$ids = $this->val($selected_ids, $name, 'array');
				} else {
					$ids = $selected_ids;
				}
				
			} else {
				$ids = $selected_ids->$name;
			}
		}
		
		
		
		return view('widgets.admin.list_checkbox', [
			'config' => $this->config,
			'objects' => $objects,
			'selected_ids' => $ids,
			'name' => $name,
		]);
	}
	
	private function getCategories($name):array
	{
		$categories_bd = Category::get();
		$categories = [];
		foreach ($categories_bd as $category) {
			$categories[] = ['name' => $name . '[' . $category->category_id . ']', 'name_no_array' => $name . '[]', 'title' => $category->title, 'value' => $category->category_id];
		}
		return $categories;
	
	}
	
	private function getProducts($name)
	{
		$products_bd = Product::where('visible', true)->get();
		$products = [];
		foreach ($products_bd as $product) {
			$products[] = ['name' => $name . '[' . $product->product_id . ']', 'name_no_array' => $name . '[]',  'title' => $product->title, 'value' => $product->product_id];
		}
		return $products;
	}
	
	private function getArticles($name)
	{
		$articles_bd = Article::where('visible', true)->get();
		$articles = [];
		foreach ($articles_bd as $article) {
			$articles[] = ['name' => $name . '[' . $article->article_id . ']',  'name_no_array' => $name . '[]', 'title' => $article->title, 'value' => $article->article_id];
		}
		return $articles;
	}
}
