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
	    $products = Product::paginate(2);
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
			ProductImage::where('product_id', $next_id)->delete();
			
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
	  
	  //Save sort image
		$sort_order_mas = request('sort_order', []);
		foreach ($sort_order_mas as $key => &$item) {
			if($item === null) {
				unset($sort_order_mas[$key]);
			} else {
				$item = (int)$item;
			}
		}
		unset($item);
	
	  $product_image = ProductImage::whereIn('product_image_id', \array_keys($sort_order_mas))->get();
	  foreach ($product_image as $item) {
		  if($item->sort_order !== $sort_order_mas[$item->product_image_id]) {
			  $item->sort_order = $sort_order_mas[$item->product_image_id];
			  $item->save();
		  }
	  }
	  
	  if(request('redirect_here', 0)) {
		  return redirect()->back()->with('status', 'Продукт успешно изменён!');
	  } else {
		  return redirect()->route('admin.product.list')->with('status', 'Продукт успешно изменён!');
	  }
	  
   
  }
	
	/**
	 * Returns the path to the first image
	 * @param $request
	 * @return string|null - path to image first
	 */
	private function getImageLoad($request)
	{
		$product_id = (int)$request->object_id;
		$flight = ProductImage::where('product_id', $product_id)->orderBy('sort_order', 'asc')->value('image');
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
      $sort_order_max = DB::table('products_image')->where('product_id', (int)$object_id)->max('sort_order');
	    $product_image_id = DB::table('products_image')->insertGetId([
        'product_id' => (int)$object_id,
        'image' => $path,
        'sort_order' => $sort_order_max + 1,
      ]);
    }
    return ['src' => $path, 'delete_key'=> $product_image_id, 'sort_order' => $sort_order_max + 1];
  }
	
	/**
	 * Delete image for product
	 * @param Request $request
	 * @return string
	 */
	public  function delete(Request $request) {
		$ids_delete = $request->input('ids_delete');
		$ids_delete = explode(',', $ids_delete);
		Product::whereIn('product_id',$ids_delete)->delete();
		foreach ($ids_delete as $item) {
			Storage::disk('public')->deleteDirectory(self::PATH_FOLDER_IMAGE . $item . '/');
		}
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
		Storage::disk('public')->delete($image);
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
			$product_image = ProductImage::where('product_id', $product_id)->orderBy('sort_order')->get();
			return view('admin.catalog.product_form', compact('product', 'product_image') + ['object_id' => $product->product_id, 'object_type' => 'product']);
		}
}
