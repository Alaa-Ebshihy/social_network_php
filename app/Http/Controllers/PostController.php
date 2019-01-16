<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Class PostController extends Controller
{

    public function getPosts()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('dashboard', ['posts' => $posts, 'user' => Auth::user()]);
    }

	public function postCreatePost(Request $request)
	{

        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

		$post = new Post();
		$post->body = $request['body'];
        $message = __('messages.error_exists');
        $message_type = __('fields.error');
        if( $request->user()->posts()->save($post)) {
            $message = __('messages.post_success');
            $message_type = '';
        }

        return redirect()->route('dashboard') -> with(['message' => $message, 'message_type' => $message_type]);
	}

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', '=', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard') -> with(['message' => 'Successfully deleted']);
    }

    public function getMyAccount()
    {
        return view('myaccount', ['user' => Auth::user()]);
    }
}