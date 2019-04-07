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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Создание нового пользователя
Route::get('admin/register', 'Admin\RegisterController@get_register')->name('admin.get_register');
Route::post('admin/register', 'Admin\RegisterController@post_register')->middleware(['web','guest'])->name('admin.post_register');

//Вход в админку
Route::get('admin/login', 'Admin\LoginController@getLogin')->name('admin.get_login');
Route::post('admin/login', 'Admin\LoginController@authenticate')->name('admin.post_login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin','middleware' => ['web','auth']], function () {
	Route::any('send_file', 'admin\AdminController@send_file'); //Вставка изображения в визивик
	Route::get('dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
	
	Route::get('product', 'Admin\ProductController@list')->name('admin.product.list');
	Route::get('product/add', 'Admin\ProductController@add')->name('admin.product.add');
	Route::post('product/save', 'Admin\ProductController@save')->name('admin.product.save');
	Route::any('product/add_image', 'admin\ProductController@addImage');
	
	
});
