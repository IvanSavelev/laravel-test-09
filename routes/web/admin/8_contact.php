<?php
Route::middleware(['web', 'auth'])->prefix('admin')->name('admin.')->group(function () {

  Route::get('contact', 'Admin\ContactController@form')->name('contact.form');
  Route::post('contact', 'Admin\ContactController@save')->name('contact.save');

});