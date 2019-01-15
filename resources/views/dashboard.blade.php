@extends('layouts.master')

@section('title')
    @lang('fields.welcome_title')
@endsection

@section('left_header')
    @lang('fields.welcome_user', ['name' => $user->first_name])
@endsection

@section('right_header')
        <form class="form-inline" action="{{ route('logout') }}" method="get">
            <button class="btn btn-primary" type="submit">@lang('fields.logout')</button>
        </form>
@endsection

@section('content')
	@include('includes.message-block')

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
        	<header><h3>@lang('fields.post_header')</h3></header>
        	<form action="{{ route('createpost') }}" method="post">
        		<div class="form-group">
                    <textarea class="form-control" name="body" id="body" rows="5" placeholder="@lang('fields.post_placeholder')"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">@lang('fields.create_post_btn')</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
        	</form>
       	</div>
    </section>

    <section class="row posts">
    	<div class="col-md-6 col-md-offset-3">
	    	<header><h3>@lang('fields.other_posts')</h3></header>
            @foreach($posts as $post)
                <div class="jumbotron">
                    <p class="lead">{{ $post->body }}</p>
                    <hr class="my-4">
                    <p>@lang('fields.posted_by', ['name' => $post->user->user_name, 'date' => $post->created_at])</p>
                    @if(Auth::user() == $post->user)
                        <a class="btn btn-primary btn-lg" href="{{ route('deletepost', ['post_id' => $post->id]) }}" role="button">@lang('fields.delete_post')</a>
                    @endif
                </div>
            @endforeach

			{{ $posts->links() }}

    	</div>

    </section>

@endsection
