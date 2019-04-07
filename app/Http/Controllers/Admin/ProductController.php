<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
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
			$max = Product::max('product_id');
			return view('admin.catalog.product_form', ['object_id' => $max+1, 'object_type' => 'product']);
		}

  /**
   * Save product
   *
   * @return \Illuminate\Http\Response
   */
  public function save(Request $request)
  {
	  
	  $request->validate([
		  'title' => 'required|max:255',
		  'h1' => 'max:255',
		  'model' => 'required|max:255|unique:products',
		  'price' => 'required|max:14|regex:/^\d+(\.\d{1,2})?$/',
		  'description' => '',
		  'meta_title' => 'max:255',
		  'meta_description' => 'max:255',
		  'visible' => 'boolean',
	  ]);
	
	  $product = new Product;
	  $product->title = $request->title;
	  $product->h1 = request('h1', '');
	  $product->model = $request->model;
	  
	  $product->image = $this->getImageLoad($request);
	  $product->price = $request->price;
	  $product->description = request('description', '');
	  $product->meta_title = request('meta_title', '');
	  $product->meta_description = request('meta_description', '');
	  $product->visible = request('visible', 0);
	  $product->save();
	  
	  
    return redirect()->route('admin.product.list');
  }
	
	/**
	 *
	 * @param $request
	 * @return string|null - path to image first
	 */
	private function getImageLoad($request)
	{
		$product_id = (int)$request->object_id;
		$flight = ProductImage::where('product_id', $product_id)->orderBy('sort_order', 'desc')->value('image');
		return $flight;
	}

  
  public  function addImage(Request $request) {
    if ($request->file('photo')->isValid()) {
      $photo_file = $request->photo->getClientOriginalName();
      $photo_filename = pathinfo($photo_file, PATHINFO_FILENAME);
      $photo_filename = str_slug($photo_filename, '-'); //Translator
      $photo_extension = $request->photo->extension();
      $photo_name = $photo_filename . '.' . time() . '.' . $photo_extension;

      $object_id = $request->input('object_id');
      $object_type = $request->input('object_type');

      $path = $request->photo->storeAs('images/' . $object_type . '/' . $object_id  , $photo_name, 'public');
      $path = '/storage/' . $path;
      $sort_order_max = DB::table('products_image')->max('sort_order');
      $id = DB::table('products_image')->insertGetId([
        'product_id' => (int)$object_id,
        'image' => $path,
        'sort_order' => $sort_order_max + 1,
      ]);
    }

    return $path;
  }

  /**
   *
   */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
		public function store(StoreProductRequest $request)
		{
			Product::create($request->all());
			return redirect()->route('products.index')->with(['message' => 'Products added successfully']);
		}
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
		public function edit($id)
		{
			$product = Product::findOrFail($id);
			return view('products.edit', compact('product'));
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
