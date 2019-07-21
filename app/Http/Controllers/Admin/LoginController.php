<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
	
	
	public function getLogin()
	{
		if (Auth::check()) {
			return	redirect()->route('admin.dashboard');
		}
		return view('admin.login.login_form');
	}
	
	public function getloginOut()
	{
		Auth::logout();
		return redirect()->route('admin.login.login_form');
	}
	
	
	public function authenticate(Request $request)
	{
		$credentials = $request->only('name', 'password');
		
		if (Auth::attempt($credentials)) {
			// Authentication passed...
			return	redirect()->route('admin.dashboard');
		}
		return redirect()->back()->with('error', 'Неправильный пароль!');

	}
	
	
}
