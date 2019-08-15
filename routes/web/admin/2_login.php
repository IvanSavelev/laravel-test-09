<?php
Route::get('admin/login', 'Admin\LoginController@getLogin')->name('admin.get_login');
Route::post('admin/login', 'Admin\LoginController@authenticate')->name('admin.post_login');
Route::get('admin/login_out', 'Admin\LoginController@getLoginOut')->name('admin.get_login_out');