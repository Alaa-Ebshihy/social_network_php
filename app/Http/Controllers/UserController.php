<?php

namespace App\Http\Controllers;

use App\USER;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Class UserController extends Controller
{
	public function postSignUp(Request $request)
	{

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'user_name' => 'required|max:60',
            'password' => 'required|min:4'
        ]);

		$user = new User();
		$user->email = $request['email'];
		$user->first_name= $request['first_name'];
		$user->last_name= $request['last_name'];
		$user->user_name= $request['user_name'];
		$user->password = bcrypt($request['password']);

		$user->save();

        Auth::login($user);

		return redirect()->route('dashboard');
	}

    public function postSignIn(Request $request)
	{
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}