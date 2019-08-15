<?php
Route::middleware(['web', 'auth'])->prefix('admin')->name('admin.')->group(function () {

  Route::get('index', 'Admin\Index\IndexController@form')->name('index.form');
  Route::post('index', 'Admin\Index\IndexController@save')->name('index.save');

});