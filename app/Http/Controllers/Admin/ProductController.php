<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductToCategory;
use App\Widgets\Admin\ListCheckboxItem;
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
	    $products = Product::paginate(50);
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
	
	  $product = Product::firstOrNew(['product_id' => $product_id]);
	  if(Product::where('product_id', $product_id)->exists()) {
	  	$add_product = false;
		  $model_validate = ['required', 'max:255', Rule::unique('products')->ignore($product)];
	  } else {
		  $add_product = true;
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
	
	 
	  ProductToCategory::where('product_id', $product_id)->delete();
	  foreach (request('product_to_category', []) as $key => $item) {
		  $product_to_category = new ProductToCategory();
		  $product_to_category->product_id = $product_id;
		  $product_to_category->category_id = $key;
		  $product_to_category->save();
	  }
	  
	  
	  if($add_product) {
		  return redirect()->route('admin.product.list')->with('status', 'Продукт успешно добавлен!');
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
	
	    $path_folder_image = 'images/' . str_replace('controller', '', strtolower(class_basename($this)));
      $path = $request->photo->storeAs($path_folder_image. '/' . $object_id  , $photo_name, 'public');
      $path = '/storage/' . $path;
	    $product_image_id = (int)$request->input('product_image_id');
      if($product_image_id) {
      	//Update
	      $this->_deleteImage($product_image_id, false);
	      ProductImage::updateOrCreate(['product_image_id' => $product_image_id], ['image' => $path]);
	      return ['src' => $path];
      } else {
      	//New
	      $sort_order_max = DB::table('products_image')->where('product_id', (int)$object_id)->max('sort_order');
	      $product_image_id = DB::table('products_image')->insertGetId([
		      'product_id' => (int)$object_id,
		      'image' => $path,
		      'sort_order' => $sort_order_max + 1,
	      ]);
	      return ['src' => $path, 'delete_key'=> $product_image_id, 'sort_order' => $sort_order_max + 1];
      }
     
	   
    }
    
  }
  
  private function _deleteImage($product_image_id, $delete_bd = true)
  {
	  //Delete image
	  $dump_pr = ProductImage::where('product_image_id', $product_image_id)->first();
	  $image = \str_replace('/storage/', '', $dump_pr->image);
	  Storage::disk('public')->delete($image);
	  //Delete sql field
	  if($delete_bd) {
		  $dump_pr = ProductImage::where('product_image_id', $product_image_id)->first();
		  $dump_pr->delete();
	  }
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
		$this->_deleteImage($delete_key);
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
			$product_to_category = ProductToCategory::where('category_id', $product_id);
			//$categories_bd = DB::table('categories as c')->join('products_to_categories as pc', 'c.category_id', '=', 'pc.category_id', 'right outer')->get(['pc.category_id as cat', 'pc.*', 'c.*']);
			$categories = $this->getCategories($product_id);
			
			return view('admin.catalog.product_form', compact('product', 'product_image', 'product_to_category', 'categories') + ['object_id' => $product->product_id, 'object_type' => 'product']);
		}
		
		private function getCategories($product_id):array {
		//	$categories_bd = DB::table('categories as c')->join('products_to_categories as pc', 'c.category_id', '=', 'pc.category_id', 'left outer')->get(['pc.category_id as cp_category_id', 'pc.*', 'c.*']);
			$categories_bd = DB::select('
        SELECT pc.category_id AS cp_category_id, pc.*, c.*
        FROM categories AS c
        LEFT OUTER JOIN products_to_categories AS pc
        ON c.category_id = pc.category_id AND pc.product_id = ?', [$product_id]);// Here I use a low-level query, because the high-level does not apply
			
			
			
			
			
			$categories = [];
			foreach ($categories_bd as $category) {
				$list_checkbox_item = new ListCheckboxItem();
				$list_checkbox_item->name = 'product_to_category['. $category->category_id . ']';
				$list_checkbox_item->title = $category->title;
				$list_checkbox_item->status = $category->cp_category_id?true:false;
				$categories[] = $list_checkbox_item;
			}
			return $categories;
		}
}
