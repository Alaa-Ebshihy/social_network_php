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
        $message = 'There was an error!';
        if( $request->user()->posts()->save($post)) {
            $message = "Post successfully created.";
        }

        return redirect()->route('dashboard') -> with(['message' => $message]);
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
}