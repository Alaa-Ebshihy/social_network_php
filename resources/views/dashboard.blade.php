@extends('layouts.master')

@section('title')
    @lang('fields.welcome_title')
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
		    	<article class="post">
		    		<p>{{ $post->body }}</p>
		    		<div class="info">
		    			@lang('fields.posted_by', ['name' => $post->user->user_name, 'date' => $post->created_at])
		    		</div>
		    		<div class="interaction">
		    			@if(Auth::user() == $post->user)
		    				<a href="{{ route('deletepost', ['post_id' => $post->id]) }}">@lang('fields.delete_post')</a>
		    			@endif
		    		</div>
		    	</article>
	    	@endforeach

			{{ $posts->links() }}

    	</div>

    </section>

@endsection
