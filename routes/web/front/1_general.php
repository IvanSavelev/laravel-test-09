<?php
//FRONT
Route::get('/', 'Front\IndexController@index')->name('front.index');

Route::get('/articles/', 'Front\ArticleController@articles')->name('front.articles');
Route::get('article/{article_id}', 'Front\ArticleController@article')->name('front.article');

Route::get('/contact/', 'Front\ContactController@index')->name('front.contact');
//Route::get('/index', 'Front\IndexController@index')->name('front.index');
/*Route::fallback(function () {
	return redirect()->route('front.index');
});*/