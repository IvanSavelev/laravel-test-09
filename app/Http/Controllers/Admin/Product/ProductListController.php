<?php

namespace App\Http\Controllers\Admin\Product;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers;

class ProductListController extends Controllers\Admin\AdminController
{


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list()
	{
		$products = App\Product::paginate(5);
		return view('admin.catalog.product_list', compact('products'));
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
		Product::whereIn('product_id', $ids_delete)->delete();
		foreach ($ids_delete as $item) {
			Storage::disk('public')->deleteDirectory(Product::getPathRoot() . $item . '/');
		}
	}


}
