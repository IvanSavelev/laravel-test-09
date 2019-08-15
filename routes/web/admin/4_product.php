<?php
Route::middleware(['web','auth'])->prefix('admin')->name('admin.')->group(function() {


  Route::get('product', 'Admin\Product\ProductListController@list')->name('product.list');
  Route::post('product/delete', 'Admin\Product\ProductListController@delete');

  Route::post('product/add_image', 'Admin\Product\ProductImageController@addImage');
  Route::post('product/delete_image', 'Admin\Product\ProductImageController@deleteImage');

  Route::get('product/add', 'Admin\Product\ProductItemController@add')->name('product.add');
  Route::post('product/save', 'Admin\Product\ProductItemController@save')->name('product.save');
  Route::get('product/{product_id}/edit', 'Admin\Product\ProductItemController@edit')->name('product.edit');
});