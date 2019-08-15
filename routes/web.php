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





Route::middleware(['web','auth'])->prefix('admin')->name('admin.')->group(function() {














	Route::fallback(function () { return redirect()->route('admin.dashboard');});
});

Route::prefix('admin')->group(function() {
	Route::fallback(function () { return redirect()->route('admin.get_login');});
});



