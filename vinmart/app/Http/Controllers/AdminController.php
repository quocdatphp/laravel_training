<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function loginAdmin()
	{
		// dd(bcrypt('123456789'));
		if (Auth::check()) {
			return redirect()->intended('home');
		}
		return view('login');
	}

	public function postLoginAdmin(Request $request)
	{
        $remember = $request->has('remember_me') ? true : false;
		if (Auth::attempt([
			'email' => $request->email,
			'password' => $request->password], $remember)) {
			return redirect()->intended('home');
		}
	}
}
