<?php
Route::middleware(['web', 'auth'])->prefix('admin')->name('admin.')->group(function () {

  Route::get('article', 'Admin\Article\ArticleListController@list')->name('article.list');
  Route::post('article/delete', 'Admin\Article\ArticleListController@delete');

  Route::get('article/add', 'Admin\Article\ArticleItemController@add')->name('article.add');
  Route::get('article/{article_id}/edit', 'Admin\Article\ArticleItemController@edit')->name('article.edit');

  //Route::get('article/{article_id}/edit', 'Admin\Article\ArticleItemController@edit')->name('article.edit');


  Route::get('article/parent_update', 'Admin\ArticleController@parentUpdate')->name('article.parent_update');
  Route::post('article/parent_save', 'Admin\ArticleController@parentSave')->name('article.parent_save');

  Route::post('article/save', 'Admin\ArticleController@save')->name('article.save');
  //Route::post('article/save', 'Admin\ArticleController@save')->name('article.save');
  //Route::resource('article', 'Admin\ArticleController')->except(['update', 'destroy', 'edit']);

});