<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Create new users
Route::get('admin/register', 'Admin\RegisterController@get_register')->name('admin.get_register');
Route::post('admin/register', 'Admin\RegisterController@post_register')->middleware(['web','guest'])->name('admin.post_register');

//Login to admin panel
Route::get('admin/login', 'Admin\LoginController@getLogin')->name('admin.get_login');
Route::post('admin/login', 'Admin\LoginController@authenticate')->name('admin.post_login');
Route::get('admin/login_out', 'Admin\LoginController@getLoginOut')->name('admin.get_login_out');

Route::middleware(['web','auth'])->prefix('admin')->name('admin.')->group(function() {

	Route::post('send_file', 'Admin\MainController@send_file'); //Вставка изображения в визивик
	Route::get('dashboard', 'Admin\MainController@dashboard')->name('dashboard');


	Route::get('product', 'Admin\Product\ProductListController@list')->name('product.list');
	Route::post('product/delete', 'Admin\Product\ProductListController@delete');

	Route::post('product/add_image', 'Admin\Product\ProductImageController@addImage');
	Route::post('product/delete_image', 'Admin\Product\ProductImageController@deleteImage');

	Route::get('product/add', 'Admin\Product\ProductItemController@add')->name('product.add');
	Route::post('product/save', 'Admin\Product\ProductItemController@save')->name('product.save');
	Route::get('product/{product_id}/edit', 'Admin\Product\ProductItemController@edit')->name('product.edit');


	Route::get('category', 'Admin\CategoryController@list')->name('category.list');
	Route::get('category/add', 'Admin\CategoryController@add')->name('category.add');
	Route::post('category/save', 'Admin\CategoryController@save')->name('category.save');
	Route::get('category/{category_id}/edit', 'Admin\CategoryController@edit')->name('category.edit');
	Route::post('category/delete', 'Admin\CategoryController@delete');


	Route::get('article', 'Admin\Article\ArticleListController@list')->name('article.list');
	Route::post('article/delete', 'Admin\Article\ArticleListController@delete');

	Route::get('article/add', 'Admin\Article\ArticleItemController@add')->name('article.add');
	Route::get('article/{article_id}/edit', 'Admin\Article\ArticleItemController@edit')->name('article.edit');



	Route::get('article/parent_update', 'Admin\ArticleController@parentUpdate')->name('article.parent_update');
	Route::post('article/parent_save', 'Admin\ArticleController@parentSave')->name('article.parent_save');

	Route::post('article/{article_id}', 'Admin\ArticleController@save')->name('article.save');
	//Route::resource('article', 'Admin\ArticleController')->except(['update', 'destroy', 'edit']);
	
	Route::get('index', 'Admin\Index\IndexController@form')->name('index.form');
	Route::post('index', 'Admin\Index\IndexController@save')->name('index.save');
	
	Route::get('contact', 'Admin\ContactController@form')->name('contact.form');
	Route::post('contact', 'Admin\ContactController@save')->name('contact.save');
	
	Route::fallback(function () { return redirect()->route('admin.dashboard');});
});

Route::prefix('admin')->group(function() {
	Route::fallback(function () { return redirect()->route('admin.get_login');});
});



//FRONT
Route::get('/', 'Front\IndexController@index')->name('front.index');

Route::get('/articles/', 'Front\ArticleController@articles')->name('front.articles');
Route::get('article/{article_id}', 'Front\ArticleController@article')->name('front.article');

Route::get('/contact/', 'Front\ContactController@index')->name('front.contact');
//Route::get('/index', 'Front\IndexController@index')->name('front.index');
/*Route::fallback(function () {
	return redirect()->route('front.index');
});*/