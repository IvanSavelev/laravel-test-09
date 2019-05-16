<?php

namespace App\Http\Controllers\Admin;


use App\F;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controllers\AdminController
{
	use F; //Plug-in universal functions
	
	/**
	 * Save product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function save(Request $request)
	{
		if ($request->file('image') and $request->file('image')->isValid()) {
			$this->deleteImageSingleton('page_index');
			$this->addImageSingleton($request->image, 'page_index');
		}
		if($request->delete_image) {
			$this->deleteImageSingleton('page_index');
		}
		$settings = Setting::where('key', 'page_index')->first();
		if($settings) {
			$data = $this->normalizeVars($request->all());
			$value = json_decode($settings->value, true);
			$data = $data + $value;
		}
		
		Setting::updateOrCreate(['key' => 'page_index'], ['value' => json_encode($data)]);
		
		if(request('redirect_here', 0)) {
			return redirect()->back()->with('status', 'Страница успешно изменена!');
		} else {
			return redirect()->route('admin.dashboard')->with('status', 'Страница успешно изменена!');
		}
	}
	
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form()
	{
		$settings = Setting::where('key', 'page_index')->first();
		if(!empty($settings)) {
			$settings = json_decode($settings->value, true);
		}
		return view('admin.index.index_form', compact('settings') + ['object_type' => 'index']);
	}



	
}
