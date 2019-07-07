<?php

namespace App\Http\Controllers\Admin\Index;



use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers;


class IndexController extends Controllers\Admin\AdminController
{
	public function save(Request $request)
	{
		Validator::make($request->all(), [
			'title' => 'required|max:255',
			'meta_title' => 'max:255',
			'meta_description' => 'max:255',
		])->validate();


		$data = $this->normalizeVars($request->all());
		Setting::updateOrCreate(['key' => 'page_index'], ['value' => json_encode($data)]);

		$this->updateImage($request, 'image');
		$this->updateImage($request, 'middle_image');
		return $this->returnSingleton();
	}
	
	
	/**
	 * Update or delete image
	 * @param $request
	 * @param $name_image
	 */
	private function updateImage($request, $name_image)
	{
		if ($request->file($name_image) and $request->file($name_image)->isValid()) {
			$this->deleteImageSingleton('page_index');
			$this->addImageSingleton($request->file($name_image), 'page_index', $name_image);
		}
		if($request->delete_image) {
			$this->deleteImageSingleton('page_index');
		}
	}
	
	public function form()
	{
		$settings = Setting::getField('page_index');
		return view('admin.index.index_form', compact('settings') + ['object_type' => 'index']);
	}
}
