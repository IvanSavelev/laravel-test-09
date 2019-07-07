<?php

namespace App\Http\Controllers\Admin\Product;


use App\ProductImage;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductImageController extends Controller
{

	/**
	 * Add image for product
	 * @param Request $request
	 * @return array
	 */
  public  function addImage(Request $request) {
    if ($request->file('photo')->isValid()) {
      $photo_file = $request->photo->getClientOriginalName();
      $photo_filename = pathinfo($photo_file, PATHINFO_FILENAME);
      $photo_filename = Str::slug($photo_filename, '-'); //Translator
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
	public  function deleteImage(Request $request) {
		$delete_key = (int)$request->input('delete_key');
		$this->_deleteImage($delete_key);
	}

}
