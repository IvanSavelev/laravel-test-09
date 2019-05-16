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



//Создание нового пользователя
Route::get('admin/register', 'Admin\RegisterController@get_register')->name('admin.get_register');
Route::post('admin/register', 'Admin\RegisterController@post_register')->middleware(['web','guest'])->name('admin.post_register');

//Вход в админку
Route::get('admin/login', 'Admin\LoginController@getLogin')->name('admin.get_login');
Route::post('admin/login', 'Admin\LoginController@authenticate')->name('admin.post_login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin','middleware' => ['web','auth']], function () {
	Route::post('send_file', 'Admin\AdminController@send_file'); //Вставка изображения в визивик
	Route::get('dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
	
	Route::get('product', 'Admin\ProductController@list')->name('admin.product.list');
	Route::get('product/add', 'Admin\ProductController@add')->name('admin.product.add');
	Route::post('product/save', 'Admin\ProductController@save')->name('admin.product.save');
	Route::get('product/{product_id}/edit', 'Admin\ProductController@edit')->name('admin.product.edit');
	Route::post('product/add_image', 'Admin\ProductController@addImage');
	Route::post('product/delete_image', 'Admin\ProductController@deleteImage');
	Route::post('product/delete', 'Admin\ProductController@delete');
	
	
	Route::get('category', 'Admin\CategoryController@list')->name('admin.category.list');
	Route::get('category/add', 'Admin\CategoryController@add')->name('admin.category.add');
	Route::post('category/save', 'Admin\CategoryController@save')->name('admin.category.save');
	Route::get('category/{category_id}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
	Route::post('category/delete', 'Admin\CategoryController@delete');
	
	/*
	Route::get('article', 'Admin\ArticleController@list')->name('admin.article.list');
	Route::get('article/add', 'Admin\ArticleController@add')->name('admin.article.add');
	Route::post('article/save', 'Admin\ArticleController@save')->name('admin.article.save');
	Route::get('article/{article_id}/edit', 'Admin\ArticleController@edit')->name('admin.article.edit');
	Route::post('article/delete', 'Admin\ArticleController@delete');
	
	Route::post('article/save', 'Admin\ArticleController@save')->name('admin.article.save_page');
	Route::post('article/save', 'Admin\ArticleController@save')->name('admin.articles.save');
	*/
	
	
	
	
	Route::get('index', 'Admin\IndexController@form')->name('admin.index.form');
	Route::post('index', 'Admin\IndexController@save')->name('admin.index.save');
	
});


Route::middleware(['web','auth'])->prefix('admin')->name('admin.')->group(function() {
	Route::get('article/parent_update', 'Admin\ArticleController@parentUpdate')->name('article.parent_update');
	Route::post('article/parent_save', 'Admin\ArticleController@parentSave')->name('article.parent_save');
	Route::post('article/delete', 'Admin\ArticleController@delete');
	Route::post('article/{article_id}', 'Admin\ArticleController@save')->name('article.save');
	Route::resource('article', 'Admin\ArticleController')->except([
		'update', 'destroy', 'edit',
	]);
});


//FRONT
Route::get('/', 'Front\IndexController@index')->name('front.index');
Route::get('/articles', 'Front\ArticleController@index')->name('front.article');
//Route::get('/index', 'Front\IndexController@index')->name('front.index');
