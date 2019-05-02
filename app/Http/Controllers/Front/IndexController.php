<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	
	    $settings = Setting::where('type', 'index')->get()->keyBy('key')->all();
	    return view('front.index', compact('settings'));
    }
}
