<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
	
	public function dashboard(Request $request)
	{
		return view('admin.dashboard.dashboard');
	}
	
	
	public  function send_file(Request $request) {
		if ($request->file('photo')->isValid()) {
			$photo_file = $request->photo->getClientOriginalName();
			$photo_filename = pathinfo($photo_file, PATHINFO_FILENAME);//впыодло
			$photo_filename = str_slug($photo_filename, '-'); //Translator
			$photo_extension = $request->photo->extension();
			$photo_name = $photo_filename . '.' . time() . '.' . $photo_extension;
			
			$object_id = $request->input('object_id');
			$object_type = $request->input('object_type');
			
			$path = $request->photo->storeAs('images/wysiwyg/' . $object_type . '/' . $object_id  , $photo_name, 'public');
			$path = '/storage/' . $path;
		}
		return $path;
	}
	
	
}
