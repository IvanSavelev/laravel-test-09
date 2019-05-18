<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controllers\AdminController
{
	public function save(Request $request)
	{
		if ($request->file('image') and $request->file('image')->isValid()) {
			$this->deleteImageSingleton('page_contact');
			$this->addImageSingleton($request->image, 'page_contact');
		}
		if($request->delete_image) {
			$this->deleteImageSingleton('page_contact');
		}
		$settings = Setting::where('key', 'page_contact')->first();
		if($settings) {
			$data = $this->normalizeVars($request->all());
			$value = json_decode($settings->value, true);
			$data = $data + $value;
		}
		
		Setting::updateOrCreate(['key' => 'page_contact'], ['value' => json_encode($data)]);
		
		return $this->returnSingleton();
	}
	
	
	public function form()
	{
		$settings = Setting::where('key', 'page_contact')->first();
		if(!empty($settings)) {
			$settings = json_decode($settings->value, true);
		}
		return view('admin.contact.contact_form', compact('settings') + ['object_type' => 'contact']);
	}
}
