<?php
Route::middleware(['web','auth'])->prefix('admin')->name('admin.')->group(function() {


 	Route::get('category', 'Admin\CategoryController@list')->name('category.list');
	Route::get('category/add', 'Admin\CategoryController@add')->name('category.add');
	Route::post('category/save', 'Admin\CategoryController@save')->name('category.save');
	Route::get('category/{category_id}/edit', 'Admin\CategoryController@edit')->name('category.edit');
	Route::post('category/delete', 'Admin\CategoryController@delete');
});