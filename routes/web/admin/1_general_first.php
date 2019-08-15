<?php
Route::middleware(['web','auth'])->prefix('admin')->name('admin.')->group(function() {
  Route::post('send_file', 'Admin\MainController@send_file'); //Вставка изображения в визивик
	Route::get('dashboard', 'Admin\MainController@dashboard')->name('dashboard');
});