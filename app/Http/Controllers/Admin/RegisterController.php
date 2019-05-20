<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
	
	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/admin/dashboard';
	
	
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255',  'unique:users'],
			'password' => ['required', 'string', 'min:0', 'confirmed'],
		]);
	}
	
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array $data
	 * @return \App\User
	 */
	public function post_register(Request $request)
	{
		$data = $request->all();
		$this->validator($data)->validate();
		$user = User::create([
			'name' => $data['name'],
			'password' => Hash::make($data['password']),
		]);
		
		//event(new Registered($user));
		$this->guard()->login($user);
		return redirect()->route('admin.dashboard');
		
	}
	
	
	protected function get_register()
	{
		return view('admin.register');
	}
	
	protected function guard()
	{
		return Auth::guard();
	}
}
