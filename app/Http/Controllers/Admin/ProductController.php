<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
	const PATH_FOLDER_IMAGE = 'images/product/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
	    $products = Product::paginate(2000);
	    return view('admin.catalog.product_list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
		public function add(Request $request)
		{
			$next_id = Product::max('product_id') + 1;
			//Clear image artifact
			$dump_pr = ProductImage::where('product_id', $next_id);
			$dump_pr->delete();
			Storage::disk('public')->deleteDirectory(self::PATH_FOLDER_IMAGE . $next_id . '/');
			
			return view('admin.catalog.product_form', ['object_id' => $next_id, 'object_type' => 'product', 'product' => null]);
		}

  /**
   * Save product
   *
   * @return \Illuminate\Http\Response
   */
  public function save(Request $request)
  {
	  $product_id = (int)$request->object_id;
	  if(Product::where('product_id', $product_id)->exists()) {
		  $product = Product::where('product_id', $product_id)->first();
		  $model_validate = ['required', 'max:255', Rule::unique('products')->ignore($product)];
	  } else {
		  $product = new Product;
		  $model_validate = ['required', 'max:255', Rule::unique('products')];
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
	  $product->visible = $request->visible == 'on'?1:0;
	  $product->save();
	  
    return redirect()->route('admin.product.list');
  }
	
	/**
	 * Returns the path to the first image
	 * @param $request
	 * @return string|null - path to image first
	 */
	private function getImageLoad($request)
	{
		$product_id = (int)$request->object_id;
		$flight = ProductImage::where('product_id', $product_id)->orderBy('sort_order', 'desc')->value('image');
		return $flight;
	}
	
	/**
	 * Add image for product
	 * @param Request $request
	 * @return array
	 */
  public  function addImage(Request $request) {
    if ($request->file('photo')->isValid()) {
      $photo_file = $request->photo->getClientOriginalName();
      $photo_filename = pathinfo($photo_file, PATHINFO_FILENAME);
      $photo_filename = str_slug($photo_filename, '-'); //Translator
      $photo_extension = $request->photo->extension();
      $photo_name = $photo_filename . '.' . time() . '.' . $photo_extension;

      $object_id = $request->input('object_id');
      $path = $request->photo->storeAs(self::PATH_FOLDER_IMAGE . $object_id  , $photo_name, 'public');
      $path = '/storage/' . $path;
      $sort_order_max = DB::table('products_image')->max('sort_order');
	    $product_image_id = DB::table('products_image')->insertGetId([
        'product_id' => (int)$object_id,
        'image' => $path,
        'sort_order' => $sort_order_max + 1,
      ]);
    }
    return ['src' => $path, 'delete_key'=> $product_image_id];
  }
	
	
	/**
	 * Delete image for product
	 * @param Request $request
	 * @return string
	 */
	public  function deleteImage(Request $request) {
		$delete_key = (int)$request->input('delete_key');
		
		//Delete image
		$dump_pr = ProductImage::where('product_image_id', $delete_key)->first();
		$image = \str_replace('/storage/', '', $dump_pr->image);
		Storage::disk('public')->deleteDirectory($image);
		//Delete sql field
		$dump_pr = ProductImage::where('product_image_id', $delete_key)->first();
		$dump_pr->delete();
	}
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
		public function edit($product_id)
		{
			$product = Product::findOrFail($product_id);
			$product_image = ProductImage::where('product_id', $product_id)->get();
			return view('admin.catalog.product_form', compact('product', 'product_image') + ['object_id' => $product->product_id, 'object_type' => 'product']);
		}
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
		public function update(StoreProductRequest $request, $id)
		{
			$product = Product::findOrFail($id);
			$product->update($request->all());
			return redirect()->route('products.index')->with(['message' => 'Product updated successfully']);
		}
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
		public function destroy($id)
		{
			$product = Product::findOrFail($id);
			$product->delete();
			return redirect()->route('authors.index')->with(['message' => 'Product deleted successfully']);
		}
	
	public function massDestroy(Request $request)
	{
		$ids = $request->input('ids');
		if($ids) {
			$products = explode(',', $request->input('ids'));
			foreach ($products as $product_id) {
				$product = Product::findOrFail($product_id);
				$product->delete();
			}
			$message = 'Авторы успешно удалены';
		} else {
			$message = 'Нет выбранных авторов';
		}
		
		return redirect()->route('authors.index')->with(['message' => $message]);
	}
	
	
}
