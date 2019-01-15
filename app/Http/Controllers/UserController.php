<?php

namespace App\Http\Controllers;

use App\USER;
use Illuminate\Http\Request;

Class UserController extends Controller
{
	public function postSignUp(Request $request)
	{
		$user = new User();
		$user->email = $request['email'];
		$user->first_name= $request['first_name'];
		$user->last_name= $request['last_name'];
		$user->user_name= $request['user_name'];
		$user->password = bcrypt($request['password']);

		$user->save();

		return redirect()->route('dashboard');
	}
}