<?php

namespace App\Http\Controllers\Admin;



use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controllers\AdminController
{
	public function save(Request $request)
	{
		if ($request->file('image') and $request->file('image')->isValid()) {
			$this->deleteImageSingleton('page_index');
			$this->addImageSingleton($request->image, 'page_index');
		}
		if($request->delete_image) {
			$this->deleteImageSingleton('page_index');
		}
		
		if ($request->file('middle_image') and $request->file('middle_image')->isValid()) {
			$this->deleteImageSingleton('page_index', 'middle_image');
			$this->addImageSingleton($request->middle_image, 'page_index', 'middle_image');
		}
		if($request->delete_middle_image) {
			$this->deleteImageSingleton('page_index', 'middle_image');
		}
		
		Validator::make($request->all(), [
			'title' => 'required|max:255',
			'meta_title' => 'max:255',
			'meta_description' => 'max:255',
		])->validate();
		
		
		$settings = Setting::where('key', 'page_index')->first();
		if($settings) {
			$data = $this->normalizeVars($request->all());
			$value = json_decode($settings->value, true);
			$data = $data + $value;
		}
		
		Setting::updateOrCreate(['key' => 'page_index'], ['value' => json_encode($data)]);
		
		return $this->returnSingleton();
	}
	
	
	public function form()
	{
		$settings = Setting::where('key', 'page_index')->first();
		if(!empty($settings)) {
			$settings = json_decode($settings->value, true);
		}
		return view('admin.index.index_form', compact('settings') + ['object_type' => 'index']);
	}
}
