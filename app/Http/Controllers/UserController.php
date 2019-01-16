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
            'signin_email' => 'required',
            'signin_password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['signin_email'], 'password' => $request['signin_password']])) {
            return redirect()->route('dashboard');
        }
        $message = __('messsages.incorrect_email_pass');
        $message_type = __('fields.error');
        return redirect()->back()->with(['message' => $message, 'message_type' => $message_type]);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function postUpdateAccount(Request $request)
    {


        $user = Auth::user();

        if($request->filled('email')) {
            $user->email = $request['email'];
            $this->validate($request, [
                'email' => 'email|unique:users',
            ]);
        }

        if($request->filled('first_name')) {
            $user->first_name = $request['first_name'];
        }
        if($request->filled('last_name')) {
            $user->last_name = $request['last_name'];
        }
        if($request->filled('user_name')) {
            $user->user_name = $request['user_name'];
        }
        if($request->filled('password')) {
            $user->password = $request['password'];
        }
        $user->update();

        return redirect()->route('myaccount')->with(['user' => Auth::user()]);
    }
}