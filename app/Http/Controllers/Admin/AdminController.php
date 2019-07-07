<?php

namespace App\Http\Controllers\Admin;

use App;
use App\F;
use App\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends App\Http\Controllers\Controller
{
	
	use F; //Plug-in universal functions
	
	protected function getDirectoryFile()
	{
		return 'images/' . str_replace('controller', '', strtolower(class_basename($this))) . '/';
	}
	
	
	
	protected function deleteImageItem($name_page, $object_id, $name_field_image = 'image')
	{
		$name_all = 'App\\' . $name_page;
		$object = $name_all::where($name_page. '_id', $object_id)->first();
		if ($object) {
			$path = $object->{$name_field_image};
		} else {
			return;
		}
		
		if ($path) {
			$path = str_replace('/storage/', '', $path);
			$pathinfo = pathinfo($path);
			$directory = $pathinfo['dirname'];
			$files = Storage::disk('public')->files($directory);
			$pattern = '/' . preg_quote($pathinfo['dirname'], '/') . '\/' . $pathinfo['filename'] . '.*' . $pathinfo['extension'] . '/';
			
			foreach ($files as $file_path) {
				if (preg_match($pattern, $file_path) === 1) {
					Storage::disk('public')->delete($file_path);
				}
			}
		}
		$object->{$name_field_image} = null;
		$object->save();
	}
	
	protected function deleteImageSingleton($page_name, $name_field_image = 'image')
	{
		$settings = Setting::where('key', $page_name)->first();
		if($settings) {
			$settings = json_decode($settings->value, true);
			$path = $this->val($settings, $name_field_image, 'string', null);
		} else {
			$path = null;
		}
		
		if($path) {
			$path = str_replace('/storage/', '', $path);
			$pathinfo = pathinfo($path);
			$directory = $pathinfo['dirname'];
			$files = Storage::disk('public')->files($directory);
			$pattern = '/' . preg_quote($pathinfo['dirname'], '/') . '\/' . $pathinfo['filename'] .'.*'. $pathinfo['extension'] .'/';
			
			foreach ($files as $file_path) {
				if(preg_match($pattern, $file_path) === 1) {
					Storage::disk('public')->delete($file_path);
				}
			}
			unset($settings[$name_field_image]);
			Setting::updateOrCreate(['key' => 'index_image'], ['value' => json_encode($settings)]);
		}
	}
	
	
	
	protected function addImage($image, $object_id, $name, $name_field_image = 'image')
	{
		$photo_file = $image->getClientOriginalName();
		$photo_filename = pathinfo($photo_file, PATHINFO_FILENAME);
		$photo_filename = Str::slug($photo_filename, '-'); //Translator
		$photo_extension = $image->extension();
		$photo_name = $photo_filename . '.' . time() . '.' . $photo_extension;
		$path_folder_image = $this->getDirectoryFile() . $object_id;
		$path = $image->storeAs($path_folder_image, $photo_name, 'public');
		$path = '/storage/' . $path;
		
		$name_all = 'App\\' . $name;
		$object = $name_all::firstOrNew([$name. '_id' => $object_id]);
		$object->{$name_field_image} = $path;
		$object->save();
		
		
		return $path;
	}
	
	
	protected function addImageSingleton($image, $name, $name_field_image = 'image')
	{
		$photo_file = $image->getClientOriginalName();
		$photo_filename = pathinfo($photo_file, PATHINFO_FILENAME);
		$photo_filename = Str::slug($photo_filename, '-'); //Translator
		$photo_extension = $image->extension();
		$photo_name = $photo_filename . '.' . time() . '.' . $photo_extension;
		$path_folder_image = 'images/' . str_replace('controller', '', strtolower(class_basename($this)));
		$path = $image->storeAs($path_folder_image, $photo_name, 'public');
		$path = '/storage/' . $path;
		
		$value = [];
		$settings = Setting::where('key', $name)->first();
		if($settings) {
			$value = json_decode($settings->value, true);
		}
		$value[$name_field_image] = $path;
		Setting::updateOrCreate(['key' => $name], ['value' => json_encode($value)]);
	}
	
	protected function returnSingleton(string $route = 'admin.dashboard')
	{
		if(request('redirect_here', 0)) {
			return redirect()->back()->with('status', 'Страница успешно изменена!');
		} else {
			return redirect()->route($route)->with('status', 'Страница успешно изменена!');
		}
	}
	
	/**
	 * Normalize request for only page
	 * @param array $vars
	 * @return array
	 */
	protected function normalizeVars(array $vars):array
	{
		foreach ($vars as $key => &$var) {
			//Delete unnecessary
			if($key == '_token' or $key == 'redirect_here') {
				unset($vars[$key]);
				continue;
			}
			//Delete file
			if(is_object($var) and class_basename($var) == 'UploadedFile') {
				unset($vars[$key]);
				continue;
			}
			if(is_array($var)) {
				foreach ($var as $key_sub => &$var_item) {
					$var_item = ctype_digit($var_item)?(int)$var_item:$var_item;
				}
				unset($var_item);
			}
			unset($var);
		}
		return $vars;
	}
}
