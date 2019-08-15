<?php
Route::middleware(['web','auth'])->prefix('admin')->name('admin.')->group(function() {
  Route::fallback(function () { return redirect()->route('admin.dashboard');});
});

Route::prefix('admin')->group(function() {
	Route::fallback(function () { return redirect()->route('admin.get_login');});
});