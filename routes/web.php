<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/dashboard', [
    'uses' => 'PostController@getPosts',
    'as' => 'dashboard'
]);

Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'createpost'
]);

Route::get('/deletepost/{post_id}', [
	'uses' => 'PostController@getDeletePost',
	'as' => 'deletepost',
	'middleware' => 'auth'
]);
