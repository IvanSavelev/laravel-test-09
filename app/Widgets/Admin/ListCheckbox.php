<?php

namespace App\Widgets\Admin;

use App\Category;
use Arrilot\Widgets\AbstractWidget;

class ListCheckbox extends AbstractWidget
{
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
	public function run(array $selected_ids, string $name)
	{
		if($this->config['type'] == 'categories') {
			$objects = $this->getCategories($name);
		}
		
		return view('widgets.admin.list_checkbox', [
			'config' => $this->config,
			'objects' => $objects,
			'name' => $name,
		]);
	}
	
	private function getCategories($name):array
	{
		$categories_bd = Category::get();
		$categories = [];
		foreach ($categories_bd as $category) {
			$categories[] = ['name' => $name . '[' . $category->category_id . ']', 'title' => 'title', 'id' => $category->category_id];
		}
		return $categories;
	
	}
}
