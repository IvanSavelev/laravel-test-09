<?php

namespace App\Http\Controllers\Admin\Product;

use App\Product as ProductModel;
use App\ProductImage;
use App\ProductToCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductItemController extends Controller
{


	public function save(Request $request)
	{
		$add_product_check = $this->checkAddOrEditProduct($request);
		$this->saveData($request, $add_product_check);
		$this->saveSortImage();
		$this->saveProductToCategory($request);
		return $this->return($add_product_check);
	}


	private function checkAddOrEditProduct(Request $request): bool
	{
		$product_id = (int)$request->object_id;
		if (ProductModel::where('product_id', $product_id)->exists()) {
			$add_product = false;
		} else {
			$add_product = true;
		}
		return $add_product;
	}

	private function saveData(Request $request, bool $add_product_check): void
	{
		$product_id = (int)$request->object_id;
		$product = ProductModel::firstOrNew(['product_id' => $product_id]);
		if ($add_product_check) {
			$model_validate = ['required', 'max:255', Rule::unique('products')];
		} else {
			$model_validate = ['required', 'max:255', Rule::unique('products')->ignore($product)];
		}

		Validator::make($request->all(), [
			'title' => 'required|max:255',
			'h1' => 'max:255',
			'model' => $model_validate,
			'price' => 'required|max:14|regex:/^[ 0-9]+(\.[0-9]+)?$/',
			'description' => '',
			'meta_title' => 'max:255',
			'meta_description' => 'max:255',
		])->validate();

		$product->title = $request->title;
		$product->h1 = request('h1', '');
		$product->model = $request->model;
		$product->image = $this->getImageLoad($request);
		$product->price = str_replace(' ', '', $request->price);
		$product->description = request('description', '');
		$product->meta_title = request('meta_title', '');
		$product->meta_description = request('meta_description', '');
		$product->visible = $request->visible == 'on' ? 1 : 0;
		$product->save();
	}


	/**
	 * Returns the path to the first image
	 *
	 * @param $request
	 *
	 * @return string|null - path to image first
	 */
	private function getImageLoad($request)
	{
		$product_id = (int)$request->object_id;
		$flight = ProductImage::where('product_id', $product_id)->orderBy('sort_order', 'asc')->value('image');
		return $flight;
	}


	private function saveSortImage(): void
	{
		$sort_order_mas = request('sort_order', []);
		foreach ($sort_order_mas as $key => &$item) {
			if ($item === null) {
				unset($sort_order_mas[$key]);
			} else {
				$item = (int)$item;
			}
		}
		unset($item);

		$product_image = ProductImage::whereIn('product_image_id', \array_keys($sort_order_mas))->get();
		foreach ($product_image as $item) {
			if ($item->sort_order !== $sort_order_mas[$item->product_image_id]) {
				$item->sort_order = $sort_order_mas[$item->product_image_id];
				$item->save();
			}
		}
	}


	private function saveProductToCategory(Request $request): void
	{
		$product_id = (int)$request->object_id;
		ProductToCategory::where('product_id', $product_id)->delete();
		foreach (request('product_to_category', []) as $key => $item) {
			$product_to_category = new ProductToCategory();
			$product_to_category->product_id = $product_id;
			$product_to_category->category_id = (int)$item;
			$product_to_category->save();
		}
	}


	private function return($add_product)
	{
		if ($add_product) {
			return redirect()->route('admin.product.list')->with('status', 'Продукт успешно добавлен!');
		}
		if (request('redirect_here', 0)) {
			return redirect()->back()->with('status', 'Продукт успешно изменён!');
		} else {
			return redirect()->route('admin.product.list')->with('status', 'Продукт успешно изменён!');
		}
	}


	public function add(Request $request)
	{
		$next_id = ProductModel::max('product_id') + 1;
		ProductImage::where('product_id', $next_id)->delete(); //Clear image artifact
		Storage::disk('public')->deleteDirectory(Product::getPathRoot() . $next_id . '/');
		return view('admin.catalog.product_form', ['object_id' => $next_id, 'object_type' => 'product', 'product' => null, 'product_to_category' => null]);
	}


	public function edit($product_id)
	{
		$product = ProductModel::findOrFail($product_id);
		$product_image = ProductImage::where('product_id', $product_id)->orderBy('sort_order')->get();
		$product_to_category = ProductToCategory::where('product_id', $product_id)->get('category_id')->toArray();
		foreach ($product_to_category as &$item) {
			$item = $item['category_id'];
		}
		return view('admin.catalog.product_form', compact('product', 'product_image', 'product_to_category') + ['object_id' => $product->product_id, 'object_type' => 'product']);
	}

}
