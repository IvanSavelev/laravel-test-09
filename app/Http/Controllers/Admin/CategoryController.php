<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controllers\Admin\AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list()
	{
		$categories = Category::paginate(50);
		return view('admin.catalog.category_list', compact('categories'));
	}
	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function add()
	{
		$next_id = Category::max('category_id') + 1;
		return view('admin.catalog.category_form', ['object_id' => $next_id, 'object_type' => 'category', 'category' => null]);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($category_id)
	{
		$category = Category::findOrFail($category_id);
		return view('admin.catalog.category_form', compact('category') + ['object_id' => $category->category_id, 'object_type' => 'category']);
	}
	
	
	/**
	 * Save category
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function save(Request $request)
	{
		$category_id = (int)$request->object_id;
		if (Category::where('category_id', $category_id)->exists()) {
			$add_category = false;
		} else {
			$add_category = true;
		}
		
		$image_path = null;
		if ($request->file('image') and $request->file('image')->isValid()) {
			$this->deleteImageItem($category_id, 'category');
			$this->addImage($request->image, $category_id, 'category');
		}
		if ($request->delete_image) {
			$this->deleteImageItem($category_id, 'category');
		}
		
		Validator::make($request->all(), [
			'title' => 'required|max:255',
			'h1' => 'max:255',
			'description' => '',
			'meta_title' => 'max:255',
			'meta_description' => 'max:255',
		])->validate();
		
		$category = Category::firstOrNew(['category_id' => $category_id]);
		$category->title = $request->title;
		$category->h1 = request('h1', '');
		$category->description = request('description', '');
		$category->meta_title = request('meta_title', '');
		$category->meta_description = request('meta_description', '');
		$category->visible = $request->visible == 'on' ? 1 : 0;
		$category->save();
		
		if ($add_category) {
			return redirect()->route('admin.category.list')->with('status', 'Категория успешно добавлена!');
		}
		if (request('redirect_here', 0)) {
			return redirect()->back()->with('status', 'Категория успешно изменена!');
		} else {
			return redirect()->route('admin.category.list')->with('status', 'Категория успешно изменена!');
		}
	}
	
	
	/**
	 * Delete image for product
	 * @param Request $request
	 * @return string
	 */
	public function delete(Request $request)
	{
		$ids_delete = $request->input('ids_delete');
		$ids_delete = explode(',', $ids_delete);
		Category::whereIn('category_id', $ids_delete)->delete();
		foreach ($ids_delete as $item) {
			Storage::disk('public')->deleteDirectory($this->getDirectoryFile() . $item . '/');
		}
	}
	
	
	
	
}
