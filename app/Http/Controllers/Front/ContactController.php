<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Category;
use App\F;
use App\Http\Controllers\Controller;
use App\Product;
use App\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	use F; //Plug-in universal functions
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$settings = json_decode(Setting::where('key', 'page_contact')->first()->value, true);
		return view('front.contact.contact', compact('settings'));
	}
}
